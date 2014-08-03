<?php
namespace Modlist;

use Klein\Klein;
use Controllers;
use Exception;

class Router extends Klein {

	/**
	 * Add a new route.
	 *
	 * @param string|array $method
	 * @param string $path
	 * @param callable|string $callback
	 *
	 * @return Route
	 */
	public function add($method, $path, $callback)
	{
		if ( ! is_callable($callback))
		{
			$callback = $this->createCallback($callback);
		}

		return $this->respond($method, $path, $callback);
	}

	/**
	 * Redirect matching requests with a status code
	 *
	 * @param string $path
	 * @param string $destination
	 * @param int $status
	 *
	 * @return callable
	 */
	public function redirect($path, $destination, $status = 301)
	{
		return $this->respond('GET', $path, function($request, $response) use ($status, $destination)
		{
			$parameters = [];
			foreach ($request->paramsNamed() as $key => $value)
			{
				if ( ! is_int($key)) $parameters['{' . $key . '}'] = $value;
			}

			$destination = str_replace(array_keys($parameters), array_values($parameters), $destination);
			return $this->response->redirect($destination, $status);
		});
	}

	/**
	 * Create a callback from a class name, named parameters are passed as
	 * arguments in order
	 *
	 * @param string $class
	 *
	 * @return callable
	 * @throws \Exception
	 */
	private function createCallback($class)
	{
		list($class, $method) = $this->parseClassName($class, 'getIndex');

		if ( ! class_exists($class)) throw new Exception("{$class} does not exist!");

		return function ($request, $response, $service, $app) use ($class, $method) {
			$parameters = [];
			foreach ($request->paramsNamed() as $key => $value)
			{
				if ( ! is_int($key)) $parameters[$key] = $value;
			}

			return call_user_func_array(array((new $class($request, $response, $service, $app)), $method), $parameters);
		};
	}

	/**
	 * Parse a class name
	 *
	 * @param string $class
	 * @param string $defaultMethod
	 *
	 * @return array
	 */
	private function parseClassName($class, $defaultMethod)
	{
		$parts = explode('@', $class);
		if ( ! isset($parts[1]))
		{
			$parts[1] = $defaultMethod;
		}

		return $parts;
	}

}
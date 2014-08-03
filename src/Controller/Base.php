<?php
namespace Modlist\Controller;

use Klein;

class Base {

	/**
	 * Request object from Klein
	 *
	 * @var Request
	 */
	var $request;

	/**
	 * Response object from Klein
	 *
	 * @var Response
	 */
	var $response;

	/**
	 * Service provider from Klein
	 *
	 * @var Service
	 */
	var $service;

	/**
	 * Initialize object with Klein objects
	 *
	 * @param Klein\Request         $request
	 * @param Klein\Response        $response
	 * @param Klein\ServiceProvider $service
	 */
	public function __construct(Klein\Request $request, Klein\Response $response, Klein\ServiceProvider $service)
	{
		$this->request = $request;
		$this->response = $response;
		$this->service = $service;

		if (method_exists($this, 'before')) $this->before();
	}

}
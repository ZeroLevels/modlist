<?php
namespace Modlist;

class Config {

	/**
	 * @param string|null $file
	 */
	public function __construct($file = null)
	{
		if ($file) $this->setFromFile($file);
	}

	/**
	 * @param string $key
	 * @param string|null $default
	 *
	 * @return string
	 */
	public function get($key, $default = null)
	{
		return $this->$key;
	}

	/**
	 * @param $key
	 * @param $value
	 */
	public function set($key, $value)
	{
		$this->$key = $value;
	}

	/**
	 * @param $file
	 */
	public function setFromFile($file)
	{
		$config = require_once($file);
		$configuration = array_dot($config);
		foreach ($configuration as $key => $value)
		{
			$this->set($key, $value);
		}
	}

}
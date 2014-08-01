<?php
namespace Modlist;

class Controller {

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
	 * Generic variable
	 *
	 * @var App
	 */
	var $app;

	/**
	 * Initialize controller with Klein objects.
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Service $service
	 * @param App $app
	 */
	public function __construct($request, $response, $service, $app)
	{
		$this->request = $request;
		$this->response = $response;
		$this->service = $service;
		$this->app = $app;
	}

}
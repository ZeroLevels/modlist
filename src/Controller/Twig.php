<?php
namespace Modlist\Controller;

use Twig_Environment;
use Twig_Loader_Filesystem;

class Twig extends Base {

	public function __construct()
	{
		$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../app/views');
		$this->twig = new Twig_Environment($loader);
	}

	public function make($view, $data = [])
	{
		return $this->twig->render($view, $data);
	}

}
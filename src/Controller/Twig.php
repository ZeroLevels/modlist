<?php
namespace Modlist\Controller;

use Twig_Environment;
use Twig_Loader_Filesystem;

class Twig extends Base {

	var $twig;

	public function make($view, $data = [])
	{
		$loader = new Twig_Loader_Filesystem(__DIR__ . '/../../app/views');
		$this->twig = new Twig_Environment($loader);
		$data['uri'] = $this->request->uri();
		return $this->twig->render($view, $data);
	}

}
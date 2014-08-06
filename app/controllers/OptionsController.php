<?php

use Modlist\Controller;

class OptionsController extends Controller\Twig {

	public function getIndex()
	{
		return $this->make("options/index.twig");
	}
	
	public function setTheme($color)
	{
		$this->response->cookie('theme',$color,2147483647);
		$this->service->back();
	}

}
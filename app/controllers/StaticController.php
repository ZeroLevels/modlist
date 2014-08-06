<?php

use Modlist\Controller;

class StaticController extends Controller\Twig {

	public function getPage($page)
	{
		return $this->make("static/$page.twig");
	}

}
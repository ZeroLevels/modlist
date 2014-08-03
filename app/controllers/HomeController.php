<?php

use Modlist\Controller;

class HomeController extends Controller\Twig {

	public function getIndex()
	{
		$versions = Version::all();
		return $this->make('home/index.twig', compact('versions'));
	}

}
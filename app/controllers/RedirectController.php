<?php

use Modlist\Controller;

class RedirectController extends Controller\Twig {
	
	public function getVersions()
	{
		$this->response->redirect('/versions');
	}

	public function getVersion($version)
	{
		$this->response->redirect("/versions/$version");
	}

}
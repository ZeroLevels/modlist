<?php

use Modlist\Controller;

class VersionsController extends Controller\Twig {

	public function getIndex()
	{
		$versions = Version::all();
		return $this->make('versions/versions.twig', compact('versions'));
	}

	public function getVersion($version)
	{
		$version = Version::where('version', $version)->first();
		$mods = $version->mods()->get();
		return $this->make('versions/version.twig', compact('version', 'mods'));
	}

}
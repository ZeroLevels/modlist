<?php

use Modlist\Controller;

class VersionsController extends Controller\Twig {

	public function getIndex()
	{
		$versions = Version::with('mods')->orderBy('version_major','version_minor')->get();
		return $this->make('versions/versions.twig', compact('versions'));
	}

	public function getVersion($version)
	{
		$version = Version::where('version', $version)->first();
		$mods = $version->mods()->with(
			'meta',
			'authors',
			'dependencies.meta',
			'types')->get();
		
		return $this->make('versions/version.twig', compact('version', 'mods'));
	}

}
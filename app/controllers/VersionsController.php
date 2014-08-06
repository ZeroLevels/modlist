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
		if(strtolower($version) === 'latest') {
			return $this->getLatestVersion();
		}
		
		$version = Version::where('version', $version)->first();
		$mods = $version->mods()->with(
			'meta',
			'authors',
			'dependencies.meta',
			'types')->get();
		
		return $this->make('versions/version.twig', compact('version', 'mods'));
	}
	
	public function getLatestVersion()
	{
		$version = Version::where('public',true)->orderBy('version_major','version_minor')->first();
		
		$this->response->redirect('/versions/' . $version->version,302);
	}

}
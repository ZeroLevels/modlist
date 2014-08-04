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
		
		foreach($mods as &$mod) {
			$authors = $mod->authors()->get();
			foreach($authors as &$author) {
				$mod['authors'][] = $author->author()->get();
			}
			
			$dependencies = $mod->dependencies()->get();
			foreach($dependencies as &$dependency) {
				$mod['dependencies'][] = $dependency->dependency()->get();
			}
			
			$types = $mod->types()->get();
			foreach($types as &$types) {
				$mod['types'][] = $types->type()->get();
			}
		}
		
		return $this->make('versions/version.twig', compact('version', 'mods'));
	}

}
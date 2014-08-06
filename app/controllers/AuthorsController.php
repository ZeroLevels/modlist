<?php

use Modlist\Controller;

class AuthorsController extends Controller\Twig {

	public function getIndex()
	{
		$authors = Author::with('mods')->get();
		return $this->make('authors/list.twig', compact('authors'));
	}

	public function getAuthor($slug)
	{
		$slug = strtolower($slug);
		$author = Author::where('slug', $slug)->first();
		
		if(empty($author)) {
			return $this->suggestAuthor($slug);
		}
		
		$mods = $author->mods()->with(
			'meta',
			'authors',
			'dependencies.meta',
			'types')->get();
		$version_ids = [];
		foreach($mods as $mod) {
			if( ! in_array($mod->version_id,$version_ids)) {
				$version_ids[] = $mod->version_id;
			}
		}
		$versions = Version::whereIn('id',$version_ids)->orderBy('version_major','version_minor')->get();
		
		return $this->make('authors/author.twig', compact('author', 'mods', 'versions'));
	}
	
	public function suggestAuthor($slug)
	{
		$suggestions = Author::whereRaw(
			'slug SOUNDS LIKE ?',
			array($slug))->get();
		return $this->make('authors/suggestions.twig', compact('suggestions'));
	}

}
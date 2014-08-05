<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Author extends Eloquent {

	public function mods()
	{
		return $this->belongsToMany('ModVersion','mod_authors','author_id','mod_version_id');
	}

}
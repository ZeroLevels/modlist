<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Author extends Eloquent {

	public function mods()
	{
		return $this->hasMany('ModAuthor');
	}

}
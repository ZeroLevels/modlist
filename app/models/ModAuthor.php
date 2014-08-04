<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class ModAuthor extends Eloquent {

	public function author()
	{
		return $this->hasOne('Author','id','author_id');
	}

}
<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Version extends Eloquent {

	public function mods()
	{
		return $this->hasMany('ModVersion');
	}

}
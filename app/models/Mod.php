<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Mod extends Eloquent {

	public function versions()
	{
		return $this->hasMany('ModVersion');
	}

}
<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class ModVersionDependency extends Eloquent {

	public function dependency()
	{
		return $this->hasOne('Mod','id','dependency_id');
	}

}
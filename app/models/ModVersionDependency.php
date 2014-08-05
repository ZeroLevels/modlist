<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class ModVersionDependency extends Eloquent {

	public function dependency()
	{
		return $this->hasOne('ModVersion','id','dependency_id');
	}

}
<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class ModVersionType extends Eloquent {

	public function type()
	{
		return $this->hasOne('Type','id','type_id');
	}

}
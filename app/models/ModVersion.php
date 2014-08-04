<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class ModVersion extends Eloquent {

	public function mod()
	{
		return $this->hasOne('Mod','id','mod_id');
	}

	public function authors()
	{
		return $this->hasMany('ModAuthor');
	}

	public function dependencies()
	{
		return $this->hasMany('ModVersionDependency');
	}

	public function types()
	{
		return $this->hasMany('ModVersionType');
	}

}
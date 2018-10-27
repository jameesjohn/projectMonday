<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function classes()
    {
    	return $this->hasMany('App\Models\StudentClass');
    }

    public function assignments()
    {
    	return $this->hasMany('App\Model\Assignment');
    }

    public function level()
    {
    	return $this->hasOne('App\Models\Level');
    }

	public function user()
	{
		return $this->hasOne('App\Models\User');
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public $fillable = [
		'id', 'user_id', 'level_id'
	];
	public $incrementing = false;

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
		return $this->belongsTo('App\User');
	}
}

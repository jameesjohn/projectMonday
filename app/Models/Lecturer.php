<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    public function classes()
    {
    	return $this->hasMany('App\Models\SchoolClass');
    }

    public function user()
    {
    	return $this->hasOne('App\User');
    }
}

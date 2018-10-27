<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function class()
    {
    	return $this->hasOne('App\Models\SchoolClass');
    }

    public function subscribers()
    {
    	return $this->hasMany('App\Models\AssignmentSubscriptions');
    }
}

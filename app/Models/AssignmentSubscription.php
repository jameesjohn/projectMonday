<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubscription extends Model
{

	public $incrementing = false;
	public function student()
    {
    	return $this->hasOne('App\Models\Student');
    }

    public function lecturer()
    {
    	return $this->hasOne('App\Models\Lecturer');
    }

    public function assignment()
    {
    	return $this->hasOne('App\Models\Assignment');
    }
}

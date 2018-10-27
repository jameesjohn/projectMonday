<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
	public $incrementing = false;

	public function student()
    {
    	return $this->hasOne('App\Model\Student');
    }
}

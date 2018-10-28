<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
	protected $fillable = [
		'id', 'class_id', 'student_id'
	];

	public $incrementing = false;

	public function student()
    {
    	return $this->hasOne('App\Model\Student');
    }
}

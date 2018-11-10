<?php

namespace App\Models;
// use Models\Student;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
	protected $fillable = [
		'id', 'class_id', 'student_id'
	];

	public $incrementing = false;

	public function student()
    {
    	return $this->belongsTo('App\Models\Student');
    }

    public function class()
    {
    	return $this->belongsTo('App\Models\SchoolClass');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubscription extends Model
{
	public $fillable = [
		'id', 'student_id', 'assignment_id', 'submitted', 'filename'
	];

	public $incrementing = false;
	public function student()
    {
    	return $this->hasOne('App\Models\StudentClass', 'student_id');
    }

    public function lecturer()
    {
    	return $this->hasOne('App\Models\Lecturer');
    }

    public function assignment()
    {
    	return $this->belongsTo('App\Models\Assignment');
    }
}

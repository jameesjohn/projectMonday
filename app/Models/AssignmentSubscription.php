<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubscription extends Model
{
    public $incrementing = false;

    public $fillable = [
		'id', 'student_id', 'assignment_id', 'submitted', 'filename'
	];

	public function student()
    {
    	return $this->belongsTo('App\Models\Student');
    }

    public function lecturer()
    {
    	return $this->hasOne('App\Models\Lecturer');
    }

    public function assignment()
    {
    	return $this->belongsTo('App\Models\Assignment');
    }

    public function score(  )
    {
        return  $this->hasOne('App\Models\Scoresheet');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Assignment extends Model
{
	public $fillable = [
		'id', 'class_id', 'title', 'description', 'submitted_on'
	];

    protected $dates = ['submitted_on'];

	public $incrementing = false;


	public function class()
    {
    	return $this->belongsTo('App\Models\SchoolClass', 'class_id');
    }

    public function subscribers()
    {
    	return $this->hasMany('App\Models\AssignmentSubscription');
    }
    public function level()
    {
    	return $this->belongsTo('App\Models\Level');
    }
    public function setPostOnAttribute($value)
    {
        $this->attributes['submitted_on'] = Carbon::parse($value);
    }
}

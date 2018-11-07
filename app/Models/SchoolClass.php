<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = 'classes';

    public $fillable = [
    	'id', 'lecturer_id', 'level_id', 'name'
    ];

    public $incrementing = false;

    public function students()
    {
    	return $this->hasMany('App\Models\StudentClass', 'class_id');
    }

    public function lecturer()
    {
    	return $this->belongsTo('App\Models\Lecturer');
    }

    public function assignments()
    {
    	return $this->hasMany('App\Models\Assignment', 'class_id');
    }
    public function level()
    {
    	return $this->belongsTo('App\Models\Level', 'level_id');
    }
}

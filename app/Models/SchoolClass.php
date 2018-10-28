<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = '';

    public $incrementing = false;

    public function students()
    {
    	return $this->hasMany('App\Models\Student');
    }

    public function lecturer()
    {
    	return $this->belongsTo('App\Models\Lecturer');
    }
}

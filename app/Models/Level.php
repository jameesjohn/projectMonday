<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public $incrementing = false;
    
    public function students()
    {
    	$this->hasMany('App\Models\Student');
    }
}

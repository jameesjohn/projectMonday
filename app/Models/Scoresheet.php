<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scoresheet extends Model
{
    protected $fillable = [
        'lecturer_id', 'student_id', 'assignment_subscription_id', 'score',
    ];
}

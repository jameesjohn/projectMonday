<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notification extends Model
{
    public $incrementing = false;
    use Notifiable;

    public $fillable = [
		'id', 'type','title','content', 'level_id','lecturer_id',
    ];
    public function level()
    {
        return $this->BelongsTo('App\Models\Level');
    }
    public function lecturer()
    {
        return $this->belongsTo('App\Models\Lecturer');
    }
}

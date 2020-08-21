<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CalendarExercises extends Model
{
    protected $fillable = [
        'calendar_id',
        'exercises_id',
        'weight',
        'repetitions'
    ];

}

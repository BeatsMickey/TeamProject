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

    public static function getCalendarExercisesByCalendarId(int $calendar_id) {
        return CalendarExercises::query()
            ->select('calendar_exercises.id', 'name', 'repetitions', 'weight')
            ->where(['calendar_id' => $calendar_id])
            ->join('exercises', 'exercises.id', '=', 'exercises_id')
            ->get();
    }

}

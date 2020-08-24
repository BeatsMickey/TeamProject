<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exercises extends Model
{
    public static function getAllExercises() {
        return Exercises::query()
            ->rightJoin('relations_exercise-category',
                'exercises.id',
                '=',
                'relations_exercise-category.exercise_id')
            ->get();
    }
}

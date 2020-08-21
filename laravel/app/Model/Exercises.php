<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Exercises extends Model
{
    public static function getAllExercises() {
        return Exercises::query()->get();
    }
}

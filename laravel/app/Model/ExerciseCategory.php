<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ExerciseCategory extends Model
{
    public static function getAll() {
        return ExerciseCategory::query()->get();
    }
}

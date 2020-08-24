<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoriesExercises extends Model
{
    public static function getAll() {
        return CategoriesExercises::query()->get();
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoriesExercises extends Model
{
    public static function getAll($numberPerPage = 3)
    {
        return CategoriesExercises::query()->paginate($numberPerPage);
    }

}

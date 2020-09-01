<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoriesExercises extends Model
{
    protected $fillable = [
        'name',
        'is_active'
    ];

    public static function getCategoriesActive(int $numberPerPage, bool $is_active = true)
    {
        return CategoriesExercises::query()
            ->where('is_active', '=', $is_active)
            ->paginate($numberPerPage);
    }

    public static function getAllActiveCategoriesForExercises(int $exercise_id) {
        return CategoriesExercises::query()
            ->select('categories_exercises.id', 'name')
            ->rightJoin('relations_exercise-category',
                'categories_exercises.id',
                '=',
                'relations_exercise-category.category_id')
            ->where('exercise_id', '=', $exercise_id)
            ->where('is_active', '=', true)
            ->get();
    }


    public static function getAll($numberPerPage)
    {
        return CategoriesExercises::query()->paginate($numberPerPage);
    }

}

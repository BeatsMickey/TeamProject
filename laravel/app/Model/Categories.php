<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    protected $fillable = [
        'name',
        'is_active'
    ];

    public static function getCategoriesActive(int $numberPerPage, bool $is_active = true)
    {
        return Categories::query()
            ->select('id', 'name', 'is_active')
            ->where('is_active', '=', $is_active)
            ->paginate($numberPerPage);
    }

    public static function getAllActiveCategoriesForExercises(int $exercise_id) {
        return Categories::query()
            ->select('categories_exercises.id', 'name')
            ->rightJoin('relations_exercise-category',
                'categories_exercises.id',
                '=',
                'relations_exercise-category.category_id')
            ->where('exercise_id', '=', $exercise_id)
            ->where('is_active', '=', true)
            ->get();
    }


    public static function getAll($numberPerPage = 3)
    {
        $categories = Categories::query()->paginate($numberPerPage);

        return Categories::query()->paginate($numberPerPage);
    }

    public function exercises() {
        return $this->belongsToMany('App\Model\Exercises');
    }

}

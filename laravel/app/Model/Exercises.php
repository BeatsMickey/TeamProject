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

    public static function getExercisesByCategoriesId($id, $numberPerPage) {
        return Exercises::query()
            ->rightJoin('relations_exercise-category',
                'exercises.id',
                '=',
                'relations_exercise-category.exercise_id')
            ->where('category_id', '=', $id)
            ->paginate($numberPerPage);
    }

    public function sets()
    {
        return $this->belongsToMany('App\Model\Sets');
    }
}

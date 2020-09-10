<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Exercises extends Model
{
    protected $fillable = [
        'name',
        'description',
        'gif_path',
        'is_active'
    ];

    public static function rules() {
        return [
            'name' => ['required', 'min:3', 'max:100'],
        ];
    }

    public static function getAllExercises() {
        return Exercises::query()->get();

        return Exercises::query()
            ->join('relations_exercise-category',
                'exercises.id',
                '=',
                'relations_exercise-category.exercise_id')
            ->get();

//        return Exercises::query()
//            ->rightJoin('relations_exercise-category',
//                'exercises.id',
//                '=',
//                'relations_exercise-category.exercise_id')
//            ->get();
    }

    public static function getExercisesByCategoriesIdActive(int $id, int $numberPerPage, bool $is_active = true) {
            return Exercises::query()
                ->rightJoin('relations_exercise-category',
                    'exercises.id',
                    '=',
                    'relations_exercise-category.exercise_id')
                ->where('category_id', '=', $id)
                ->where('is_active', '=', $is_active)
                ->paginate($numberPerPage);
    }

    public static function getExercisesByCategoriesIdAll(int $id, int $numberPerPage) {
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

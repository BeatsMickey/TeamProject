<?php

namespace App\Http\Controllers\Exercises;

use App\Http\Controllers\Controller;
use App\Model\CategoriesExercises;
use App\Model\Exercises;
use Illuminate\Http\Request;

class ExercisesController extends Controller
{
    public function index() {
        $categories = CategoriesExercises::all();
        return view('exercises.categories', ['categories' => $categories]);
    }

    public function categories($id) {
        $exercises = Exercises::getExercisesByCategoriesId($id, 5);
        $category = CategoriesExercises::find($id);
        return view('exercises.exercises_by_category', ['exercises' => $exercises, 'category' => $category]);
    }

    public function card($id) {
        $exercise = Exercises::find($id);
        return view('exercises.exercises_card', ['exercise' => $exercise]);
    }
}

<?php

namespace App\Http\Controllers\Exercises;

use App\Http\Controllers\Controller;
use App\Model\CategoriesExercises;
use App\Model\Exercises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExercisesController extends Controller
{
    public function index()
    {
        $categories = CategoriesExercises::getCategoriesActive(5);
        return view('exercises.categories', ['categories' => $categories]);
    }

    public function categories($id)
    {
        $exercises = Exercises::getExercisesByCategoriesIdActive($id, 5);
        $category = CategoriesExercises::find($id);
        return view('exercises.exercises_by_category', ['exercises' => $exercises, 'category' => $category]);
    }

    public function card($id)
    {
        $exercise = Exercises::find($id);
        return view('exercises.exercises_card', ['exercise' => $exercise]);
    }

    public function create(Request $request)
    {

        if ($request->method() === "POST") {
            $exercise = new Exercises;
            $exercise->fill($request->all());
            $exercise->created_by = Auth::user()->id;
            $exercise->save();
            return redirect()->route('set.index');
        }

        return view('exercises.create');
    }
}

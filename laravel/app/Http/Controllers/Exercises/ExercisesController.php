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
            return redirect()->route('exercises.all');
        }

        return view('exercises.create');
    }

    public function destroy(Request $request) {
        $user = Auth::user();
        $exercise_id = $request->input('exercise_id');
        $exercise = Exercises::find($exercise_id);
        if($user->id === $exercise->created_by || $user->is_admin) {
            $exercise->delete();
            return redirect()->back()->with('message', 'Упражнение успешно удалено.');
        }

        return redirect()->back()->with('message', 'У Вас не достаточно прав для удаления данного упражнения.');
    }

    public function all() {
        $exercises = Exercises::getAllExercises();

        return view("exercises.index", [
           'exercises' => $exercises
        ]);
    }

    public function update(Exercises $exercise) {
        return view();
        dd($exercise);
    }
}

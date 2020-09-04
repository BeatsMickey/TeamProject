<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Model\Exercises;
use App\Model\Sets;
use Illuminate\Http\Request;

class SetController extends Controller
{
    public function getAllWithExercises()
    {
        $sets = Sets::getAll();
        foreach ($sets as $set) {
            $set->exercises = $set->exercises()->get();
        }

        return $sets;
    }

    public function index()
    {

        $sets = $this->getAllWithExercises();

        return view('set.index', [
            'sets' => $sets,
        ]);
    }

//    public function show($id) {
//        $set = $this->getOneWithExercises($id);
//
//        return view('set.one', [
//            'set' => $set,
//        ]);
//    }

    public function create(Request $request)
    {
        $exercises = Exercises::getAllExercises();

        if ($request->method() === "POST") {
            $set = new Sets();
            $exercises = [];
            $request->validate(Sets::rules());

            foreach ($request->input() as $key => $value) {
                if ($key == 'name') {
                    $set->name = $value;
                } elseif ($key !== "_token" && $value) {
                    array_push($exercises, $value);
                }
            }

            $set->save();
            $set->exercises()->attach($exercises);

            return redirect()->route('set.index')->with('message', 'Набор упражнений успешно добавлен.');
        }

        return view('set.create', [
            'exercises' => $exercises,
        ]);
    }

    public function update(Request $request, $id)
    {
        $set = Sets::find($id);
        $all_exercises = Exercises::getAllExercises();
        $set_exercises = [];
        foreach ($set->exercises()->get() as $exercise) {
            array_push($set_exercises, $exercise);
        }

//        dd($set_exercises);
        if ($request->method() === "POST") {
            if ($request->input('name')) {
                $set->name = $request->input('name');
                $set->save();
            }

            if ($request->input('exercise_id')) {
                $set->exercises()->attach($request->input('exercise_id'));
            }

            return redirect()->back();
        }

        return view('set.update', [
            'set' => $set,
            'set_exercises' => $set_exercises,
            'all_exercises' => $all_exercises
        ]);
    }

    public function destroy(Sets $set)
    {
        $set->exercises()->detach();
        $set->delete();
        return redirect()->route('set.index')->with('message', 'Набор упражнений успешно удален.');
    }

    public function deleteExercise(Sets $set, $exercise_id) {
        $set->exercises()->detach($exercise_id);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Model\Exercises;
use App\Model\Sets;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                    // Так упражения в наборе не будут повторяться
                    $exercises[$value] = $value;
                }
            }

            $set->created_by = Auth::user()->id;
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
//        dd($all_exercises);
        $set_exercises = [];
        $set_exercises_ids = [];
        foreach ($set->exercises()->get() as $exercise) {
            array_push($set_exercises, $exercise);
            $set_exercises_ids[$exercise->id] = $exercise->id;
        }

        if ($request->method() === "POST") {
            $user = Auth::user();
            if($user->id !== $set->created_by && !$user->is_admin)
                return redirect()->back()->with('message', 'У Вас не достаточно прав для изменения данного набора упражнений.');

            if ($request->input('name')) {
                $set->name = $request->input('name');
                $set->save();
            }

            if ($request->input('exercise_id')) {
                $id = $request->input('exercise_id');

                // Проверка: упражения в наборе не должны повторяться
                if(!Arr::exists($set_exercises_ids, $id)) {
                    $set->exercises()->attach($id);
                    return redirect()->back()->with('message', 'Упражнение добавлено в набор.');
                }

                return redirect()->back()->with('message', 'Такое упражнение уже есть в наборе.');
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
        $set_is_used = DB::table('programs_sets')->where('sets_id', $set->id)->get();

        if(isset($set_is_used[0]))
            return redirect()->back()->with(["message" => 'Ошибка: набор нельзя удалить, так как он задействован в одной из программ']);

        $user = Auth::user();
        if($user->id === $set->created_by || $user->is_admin) {
            $set->exercises()->detach();
            $set->delete();
            return redirect()->route('set.index')->with('message', 'Набор упражнений успешно удален.');
        }

        return redirect()->route('set.index')->with('message', 'У Вас не достаточно прав для удаления данного набора упражнений.');
    }

    public function deleteExercise(Sets $set, $exercise_id) {
        $user = Auth::user();

        if($user->id !== $set->created_by && !$user->is_admin)
            return redirect()->back()->with('message', 'У Вас не достаточно прав для изменения данного набора упражнений.');

        $set->exercises()->detach($exercise_id);
        return redirect()->back()->with('message', 'Упражнение удалено из набора.');
    }
}

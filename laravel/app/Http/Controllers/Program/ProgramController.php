<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Model\Programs;
use App\Model\Sets;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    public function index() {
//        $sets = Sets::getAll();
        $programs = Programs::getAll();

        $current_program = Programs::query()->where('id', Auth::user()->programs_id)->first();

        return view('program.index', [
//            'sets' => $sets,
//            'user' => Auth::user(),
            'programs' => $programs,
            'current_program' => $current_program,
        ]);
    }

    public function show($id) {
        $program = Programs::query()->where('id', $id)->first();
        $sets = $program->sets()->orderBy('day_of_program')->get();

        foreach ($sets as $set) {
            $set->exercises = $set->exercises()->get();
        }

        return view('program.one', [
            'program' => $program,
            'sets' => $sets,
        ]);
    }

    public function chooseProgram($id) {
        $user = Auth::user();
        $user->programs_id = $id;
        $user->save();

        return redirect()->route('program.index')->with('message', "Программа успешно выбрана");
    }

    public function resetProgram() {
        $user = Auth::user();
        $user->programs_id = null;
        $user->save();
        return redirect()->route('program.index')->with('message', "Параметры программы сброшены");
    }

    public function create(Request $request) {
        $sets = Sets::getAll();

        if ($request->method() === "POST") {
            $days_filled_with_training = 0;
            for($day_of_program = 1; $day_of_program <=7; $day_of_program++) {
                if($request->input('day_' . $day_of_program)) {
                    $days_filled_with_training++;
                }
            }

            if(!$days_filled_with_training) {
                return view('program.create', [
                    'sets' => $sets,
                ])->withErrors(['token' => 'Ошибка: все дни программы пустые']);
            }


            $program = new Programs();
            $request->validate(Programs::rules());
            $program->fill(['name' => $request->input('name'), 'created_by' => Auth::user()->id]);
            $program->save();

            for($day_of_program = 1; $day_of_program <=7; $day_of_program++) {
                if($request->input('day_' . $day_of_program)) {
                    $set_id = $request->input('day_' . $day_of_program);
                    $program->sets()->attach($set_id, ['day_of_program' => $day_of_program]);
                }
            }

            return redirect()->route('program.index')->with('message', 'Программа успешно добавлена.');
        }

        return view('program.create', [
            'sets' => $sets
        ]);

    }


    public function update(Request $request, $id) {
        $user = Auth::user();
        $program = Programs::find($id);

        if($user->id !== $program->created_by && !$user->is_admin) {
            return redirect()->route('program.index')->with(['message' => 'У Вас недостаточно прав для изменения этой программы']);
        }

        $sets = Sets::getAll();
        $program_sets_unsorted = $program->sets()->orderBy('day_of_program')->get();
        $program_sets = [];
        foreach ($program_sets_unsorted as $set) {
            $program_sets[$set->pivot['day_of_program']] = $set;
        }

        if ($request->method() === "POST") {
            /* TODO  делать рроверку: если все дни программы пустые - выдать ошибку */
            $days_filled_with_training = 0;
            for($day_of_program = 1; $day_of_program <=7; $day_of_program++) {
                if($request->input('day_' . $day_of_program)) {
                    $days_filled_with_training++;
                }
            }

            $request->validate(Programs::rules());
            $program->fill(['name' => $request->input('name')]);
            $program->save();

            for($day_of_program = 1; $day_of_program <=7; $day_of_program++) {
                if($request->input('day_' . $day_of_program)) {
                    $set_id = $request->input('day_' . $day_of_program);
                    $check_set_exists = isset($program_sets[$day_of_program]);

                    if ($check_set_exists)
                        $check_set_id_changed = !($program_sets[$day_of_program]->id == $set_id);

                    if($check_set_exists && $check_set_id_changed) {
                        $old_set_id = $program_sets[$day_of_program]->id;
                        $program->sets()->newPivotStatementForId($old_set_id)->whereDayOfProgram($day_of_program)->delete();
                        $program->sets()->attach($set_id, ['day_of_program' => $day_of_program]);
                    }
                    elseif(!($check_set_exists && !$check_set_id_changed)) {
//                        dd($set_id, $program_sets[$day_of_program]->id);
                        $program->sets()->attach($set_id, ['day_of_program' => $day_of_program]);
                    }

                } else {
                    if(isset($program_sets[$day_of_program])) {
                        $set_id = $program_sets[$day_of_program]->id;
                        $program->sets()->newPivotStatementForId($set_id)->whereDayOfProgram($day_of_program)->delete();
//                        $program->sets()->detach($set_id, ['day_of_program' => $day_of_program]);
                    }
                }
            }

            return redirect()->back();
//            return redirect()->route('program.index')->with('message', 'Программа успешно изменена.');

        }

        return view('program.update', [
            'program' => $program,
            'sets' => $sets,
            'program_sets' => $program_sets,
        ]);
    }

    public function destroy(Programs $program) {
        $user = Auth::user();
        if($user->id === $program->created_by || $user->is_admin) {
            $program->sets()->detach();
            $program->delete();
            return redirect()->route('program.index')->with('message', 'Категория успешно удалена.');
        }

        return redirect()->route('program.index')->with('message', 'У Вас не хватает прав для удаления данной программы.');
    }
}

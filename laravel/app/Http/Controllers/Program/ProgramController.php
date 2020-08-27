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
        $sets = Sets::getAll();
        $programs = Programs::getAll();
        return view('program.index', [
            'sets' => $sets,
            'programs' => $programs
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
}

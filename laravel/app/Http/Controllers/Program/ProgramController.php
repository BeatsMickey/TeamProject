<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Model\Programs;
use App\Model\Sets;
use Illuminate\Http\Request;

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
//        $program = Programs::find(1)->get();
        $sets = Programs::find($id)->sets()->orderBy('day_of_program')->get();

        return view('program.one', [
            'program' => $program,
            'sets' => $sets,
        ]);
    }
}

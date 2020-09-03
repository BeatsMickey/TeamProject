<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Model\Sets;

class SetController extends Controller
{
    public function index() {

        $sets = Sets::getAll();
        foreach ($sets as $set) {
            $set->exercises = $set->exercises()->get();
        }

        return view('set.index', [
            'sets' => $sets,
        ]);
    }

    public function show($id) {
        dd(111);
        $set = Sets::find($id);


        return view('set.one', [
            'set' => $set,
        ]);
    }
}

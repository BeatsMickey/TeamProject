<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Model\Sets;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index() {
        $sets = Sets::getAll();
        return view('program', [
            'sets' => $sets
        ]);
    }
}

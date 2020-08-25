<?php

namespace App\Http\Controllers\TrainingLog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index() {
        return view('program', []);
    }
}

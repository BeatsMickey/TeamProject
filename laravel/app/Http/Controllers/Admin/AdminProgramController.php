<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProgramController extends Controller
{
    function index() {
        return redirect(route('program.index'));
    }
}

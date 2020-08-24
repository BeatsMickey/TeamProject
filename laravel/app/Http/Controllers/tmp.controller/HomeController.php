<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $month = date('n', time());
        $url = route('trainingLog.calendar', ['month' => $month]);
        return view('index', ['url' => $url]);
    }
}

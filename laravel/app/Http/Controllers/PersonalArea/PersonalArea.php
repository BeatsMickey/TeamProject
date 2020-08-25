<?php

namespace App\Http\Controllers\PersonalArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalArea extends Controller
{
    public function index() {
        $id = Auth::id();
        return "Личный кабинет пользователя с id {$id}";
    }
}

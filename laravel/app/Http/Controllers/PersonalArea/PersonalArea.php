<?php

namespace App\Http\Controllers\PersonalArea;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDataRequest;
use App\Model\UserDetails;
use App\model\Users;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PersonalArea extends Controller
{
    public function index() {
        $id = Auth::id();
        $details = UserDetails::getAllDetailsByUserId($id);
        return view('personal_area.personal', ['user' => Auth::user(), 'details' => $details ]);
    }

    public function change(UserDataRequest $request) {
        if(Hash::check($request->get('prev_password'), Auth::user()->getAuthPassword())) {
            $user = Users::find(Auth::id());
            $password = $request->get('password') ? Hash::make($request->get('password')) : Auth::user()->getAuthPassword();
            $user->fill(['name' => $request->get('name') ?? $user->name,
                'email' => $request->get('email') ?? $user->email,
                'password' => $password]);
            $user->save();

            $details = UserDetails::getAllDetailsByUserId(Auth::id());
            $details->fill(['lastname' => $request->get('lastname'),
                'age' => $request->get('age'),
                'gender' => $request->get('gender')]);
            $details->save();
        }

        return redirect()->route('personal.area');
    }
}

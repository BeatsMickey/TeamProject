<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserUpdateRequest;
use App\model\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    public function index() {
        $users = Users::getAllUsers(5);
        return view('admin.users', ['users' => $users]);
    }

    public function update($id) {
        $user = Users::find($id);
        return view('admin.update_user', ['user' => $user]);
    }

    public function save(AdminUserUpdateRequest $request, $id) {
        $user = Users::find($id);
        $password = $request->get('password') ? Hash::make($request->get('password')) : $user->password;
        $user->fill(['name' => $request->get('name') ?? $user->name,
            'email' => $request->get('email') ?? $user->email,
            'password' => $password,
            'is_admin' => $request->post('is_admin') ?? $user->is_admin]);
        $user->save();
        return redirect()->route('admin.users.update', ['id' => $id]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller {
    public function index() {
        $users = User::all();

        return view('users.index', ['users'=> $users]);
    }

    public function tambah(Request $request) {
        if ($request->has('name')) {
            $user = new User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $user->save();
            return redirect('/user');
        } else {
            return view('users.tambah');
        }
    }

    public function  lihat() {
        return view('users.lihat');
    }

    public function  edit() {
        return view('users.edit');
    }
}

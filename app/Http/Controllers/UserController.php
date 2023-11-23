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
        $user = new User;
        if ($request->has('name')) {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $user->save();
            return redirect('/user');
        } else {
            return view('users.tambah', compact('users'));
        }
    }

    /* public function lihat(Request $request, string $id) {
        if ($request->has('name')) {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $user->save();
            return redirect('/user');
        } else {
            $user = User::findOrFail($id);
            return view('users.tambah', compact('users'));
        }
    }*/

    public function  lihat() {
        return view('users.lihat');
    }

    public function  edit() {
        return view('users.edit');
    }
}

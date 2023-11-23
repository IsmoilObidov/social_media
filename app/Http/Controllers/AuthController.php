<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $user = User::create([
            'name' => $validate['name'],
            'email' =>  $validate['email'],
            'gender' =>  $req->gender,
            'password' => Hash::make($validate['password'])
        ]);

        if ($req->gender == 1) {
            $user->update([
                'photo' => 'assets/images/profile/user-1.jpg'
            ]);
        } else {
            $user->update([
                'photo' => 'assets/images/profile/female.avif'
            ]);
        }

        return $this->login($req);
    }


    function login(Request $req)
    {
        $tolls = $req->only('name', 'password');

        if (!Auth::attempt($tolls)) {
            return 'error';
        }

        return redirect()->route('/');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

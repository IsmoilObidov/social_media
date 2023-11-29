<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function profile()
    {
        return view('profile', ['user' => Auth::user()]);
    }

    function edit_profile(Request $req)
    {
        $validation = $req->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);

        $path = '';

        if ($req->file('photo')) {
            $req->file('photo')->store('public');
            $path = 'storage/' . $req->file('photo')->hashName();
        }

        User::where('id', Auth::id())->first()->update([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'photo' => $path,
        ]);


        if ($req->password) {
            User::where('id', Auth::id())->first()->update([
                'password' => $validation['password']
            ]);
        }


        return back()->with('success', 'Updated successfully');
    }

    function filter_user(Request $req)
    {
        return User::where('name', 'LIKE', '%' . $req->text . '%')->get();
    }

    function review($email)
    {
        return view('user_profile', ['user' => User::where('email', $email)->first()]);
    }



    
    // function follower(Request $req)
    // {
    //     $validation = $req->validate([
    //         'user_id' => 'required',
    //         'follow_id' => 'required',
    //     ]);       
        


    //     Follower::creat([
    //         'user_id' => $validation['user_id'],
    //         'follow_id' => $validation['follow_id'],
    //     ]);

    //     return back();
    // }

}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function index()
    {
        return view('welcome', ['posts' => Post::all()]);
    }

    function new_post()
    {
        return view('new_post');
    }

    function create_post(Request $req)
    {
        $validate = $req->validate([
            'photo' => 'required',
            'text' => 'required|max:1000'
        ]);

        $path = '';

        if ($req->file('photo')) {
            $req->file('photo')->store('public/posts');
            $path = 'storage/posts/' . $req->file('photo')->hashName();
        }

        Post::create([
            'user_id' => Auth::id(),
            'photo' => $path,
            'text' => $validate['text'],
            'is_commentable' => $req->comment ? 1 : 0
        ]);

        return back()->with('success', 'New post uploaded');
    }
}

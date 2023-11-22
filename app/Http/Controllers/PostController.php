<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
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





    function post($id)
    {
        return view('comment', ['post' => Post::find($id), 'comments' => Comment::where('post_id', $id)->orderBy('id', 'desc')->get()]);
    }

    function save_comment($id, Request $req)
    {

        $validate = $req->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $id,
            'text' => $req->comment,
        ]);

        return back()->with('success', 'New comment uploaded');
    }

    function do_like(Request $req)
    {
        $existingLike = Like::withTrashed()->where('user_id', Auth::id())->where('post_id', $req->post_id)->first();

        if ($existingLike) {
            if ($existingLike->trashed()) {

                $existingLike->restore();
                return 'restored_like';
            } else {

                $existingLike->delete();
                return 'removed_like';
            }
        } else {

            Like::create([
                'user_id' => Auth::id(),
                'post_id' => $req->post_id
            ]);

            return 'liked';
        }
    }
    function delete_comment($id)
    {
        Comment::where('id', '=', $id)->first()->delete();
        return back();
    }
}

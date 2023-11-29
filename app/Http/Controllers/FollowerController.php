<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function follow(Request $req)
    {
        if (Follower::where('user_id', $req->id)->where('follower_id', Auth::id())->first()) {
            Follower::where('user_id', $req->id)->where('follower_id', Auth::id())->first()->delete();
            return 'unfollowed';
        } elseif (Follower::withTrashed()->where('user_id', $req->id)->where('follower_id', Auth::id())->first()) {
            Follower::withTrashed()->where('user_id', $req->id)->where('follower_id', Auth::id())->first()->restore();
        } else {
            Follower::create([
                'user_id' => $req->id,
                'follower_id' => Auth::id()
            ]);
        }

        return 'followed';
    }
}

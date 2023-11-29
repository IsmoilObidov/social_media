<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function get_user($id)
    {
        if (Chat::where('id', $id)->where('sender_id', Auth::id())->first()) {
            return User::find(Chat::find($id)->receiver_id);
        } else {
            return User::find(Chat::find($id)->sender_id);
        }
    }
}

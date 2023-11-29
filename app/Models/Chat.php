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
        if (Chat::where('id', $id)->where('user_one', Auth::id())->first()) {
            return User::find(Chat::find($id)->user_two);
        } else {
            return User::find(Chat::find($id)->user_one);
        }
    }

    function chat_messages()
    {
        return $this->hasMany(ChatMessage::class, 'chat_id', 'id');
    }
}

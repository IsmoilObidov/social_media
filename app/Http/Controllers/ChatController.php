<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    function index()
    {
        $chats = [];

        foreach (Chat::where('user_one', Auth::id())->get() as $key) {
            array_push($chats, $key);
        }

        foreach (Chat::where('user_two', Auth::id())->get() as $key1) {
            array_push($chats, $key1);
        }

        return view('chat', ['chatters' => $chats]);
    }

    function chat_messages($id)
    {
        $chat = Chat::find($id);

        $mas = [];

        foreach ($chat->chat_messages as $key) {
            if ($key->user_id == Auth::id()) {
                $position = 'right';
            } else {
                $position = 'left';
            }

            $mas[] = [
                'id' => $key->id,
                'chat_id' => $key->chat_id,
                'text' => $key->text,
                'created_at' => Carbon::parse($key->created_at)->format('d.m.Y'),
                'user_avatar' => asset($key->user->photo),
                'user_name' => $key->user->name,
                'position' => $position
            ];
        }

        return $mas;
    }

    function send_message(Request $req)
    {
        if ($req->chat_id == null) {

            $chat = Chat::crate([
                'user_one' => Auth::id(),
                'user_two' => $req->receiver_id
            ]);
        } else {
            $chat = Chat::find($req->chat_id);
        }


        ChatMessage::create([
            'chat_id' => $chat->id,
            'user_id' => Auth::id(),
            'text' => $req->message
        ]);
    }
}

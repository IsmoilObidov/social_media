<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    function index()
    {
        return view('chat', ['chatters' => Chat::all()]);
    }
}

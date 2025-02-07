<?php

namespace App\Http\Repositories;

use App\Models\Chat;
use Auth;

class ChatRepository
{
    protected $chat;

    public function store($request)
    {
        $data = $request->all();
        $chat = new Chat();
        $chat->message = $data["message"];
        $chat->user_id = Auth::id();
        $chat->save();
    }
}

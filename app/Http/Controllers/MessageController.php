<?php

namespace App\Http\Controllers;

use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        abort_unless(Auth::check(), 401);

        $newMessage             = new Message();
        $newMessage->user_id    = Auth::id();
        $newMessage->channel_id = $request->channel;
        $newMessage->message    = $request->message;
        $newMessage->save();

        broadcast(new \App\Events\BroadcastEvent($request->message));

        return $this->getMessages();
    }

    public function getMessages()
    {
        abort_unless(Auth::check(), 401);
        //
        $messages = Message::with('user')->latest()->take(20)->get();
        //
        return $messages;
    }
}

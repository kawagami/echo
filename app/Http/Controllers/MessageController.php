<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $newMessage             = new Message();
        $newMessage->user_id    = Auth::id();
        $newMessage->channel_id = $request->channel;
        $newMessage->message    = $request->message;
        $newMessage->save();

        broadcast(new \App\Events\BroadcastEvent($request->message));
        // return 'send';

        return $this->getMessages();
        return $newMessage;
        // return 'hope broadcast success';
    }

    public function getMessages()
    {
        return Message::with('user')->latest()->take(20)->get();
    }
}

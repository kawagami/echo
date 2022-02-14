<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EchoController extends Controller
{
    public function send(Request $request)
    {
        broadcast(new \App\Events\BroadcastEvent($request->message));
        // return 'send';
        return 'hope broadcast success';
    }
}

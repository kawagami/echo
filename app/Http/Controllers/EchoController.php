<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EchoController extends Controller
{
    public function send(Request $request)
    {
        // return 'send';
        return $request->message;
    }
}

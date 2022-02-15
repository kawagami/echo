<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChannelController extends Controller
{
    public function getChannels()
    {
        abort_unless(Auth::check(), 401);

        return Channel::select('id', 'name')->get();
    }
}

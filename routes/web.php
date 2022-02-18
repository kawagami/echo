<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // broadcast(new \App\Events\BroadcastEvent());
    // return view('welcome');
    return view('chat');
});

// Route::get('/', function () {
//     // 加入以下程式碼來觸發 Event
//     broadcast(new \App\Events\BroadcastEvent());
//     return view('welcome');
// });

// Route::post('/send', function () {
//     broadcast(new \App\Events\BroadcastEvent());
//     return response('OK');
// });
Route::post('/message/send-message', [\App\Http\Controllers\MessageController::class, 'sendMessage']);
Route::get('/message/get-messages', [\App\Http\Controllers\MessageController::class, 'getMessages']);

Route::get('/channel/get-channels', [\App\Http\Controllers\ChannelController::class, 'getChannels']);

Route::get('/user/get-id', [\App\Http\Controllers\UserController::class, 'getId']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

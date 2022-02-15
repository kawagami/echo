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
    return view('welcome');
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
Route::post('/message/sendMessage', [\App\Http\Controllers\MessageController::class, 'sendMessage']);
Route::post('/message/getMessages', [\App\Http\Controllers\MessageController::class, 'getMessages']);

Route::post('/channel/channels', [\App\Http\Controllers\ChannelController::class, 'channels']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

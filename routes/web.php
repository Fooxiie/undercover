<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\GameController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user()->name;
    return view('dashboard', compact('user'));
})->middleware(['auth'])->name('dashboard');

Route::get('/play/{roomid}', [GameController::class, 'show'])->middleware(['auth'])->name('game');
Route::get('/create/play', [GameController::class, 'create'])->middleware(['auth'])->name('game.create');

Route::get('/render/message', [ChatController::class, 'render_message'])->name('render.message');
Route::get('/send/message', [ChatController::class, 'sendMessage'])->name('send.message');

require __DIR__ . '/auth.php';

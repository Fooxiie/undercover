<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DiscordController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SuggestionController;
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
})->name('welcome');

Route::get('/dashboard', function () {
    $user = Auth::user()->name;
    return view('dashboard', compact('user'));
})->middleware(['auth'])->name('dashboard');

Route::get('/play/{roomid}', [GameController::class, 'show'])->middleware(['auth'])->name('game');
Route::get('/create/play', [GameController::class, 'create'])->middleware(['auth'])->name('game.create');

Route::get('/suggestion', [SuggestionController::class, 'show'])->name('suggestion.show');
Route::get('/suggestion/create', [SuggestionController::class, 'create'])->name('suggestion.create');
Route::post('/suggestion/create/submit', [SuggestionController::class, 'submit'])->name('suggestion.submit');

Route::get('/render/message', [ChatController::class, 'render_message'])->name('render.message');
Route::get('/send/message', [ChatController::class, 'sendMessage'])->name('send.message');

Route::get('/auth/redirect', [DiscordController::class, 'redirect'])->name('discord.redirect');
Route::get('/auth/callback', [DiscordController::class, 'callback'])->name('discord.callback');

require __DIR__ . '/auth.php';

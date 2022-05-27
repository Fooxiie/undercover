<?php

use App\Events\PlayerJoined;
use App\Http\Controllers\ChatController;
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
    $id = Auth::user()->id;
    $user = Auth::user()->name;
    event(new PlayerJoined($id));
    return view('dashboard', compact('id', 'user'));
})->middleware(['auth'])->name('dashboard');

Route::get('/render/message', [ChatController::class, 'render_message'])->name('render.message');

require __DIR__ . '/auth.php';

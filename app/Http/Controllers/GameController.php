<?php

namespace App\Http\Controllers;

use App\Events\PlayerJoined;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function show()
    {
        $id = Auth::user()->id;
        event(new PlayerJoined($id));
        return view('onGame');
    }
}

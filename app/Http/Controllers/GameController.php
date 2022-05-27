<?php

namespace App\Http\Controllers;

use App\Events\PlayerJoined;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function show(Request $request, $roomid)
    {
        $id = Auth::user()->id;
        event(new PlayerJoined($id, $roomid));
        $room = $roomid;
        return view('onGame', compact('room'));
    }

    public function create()
    {
        return redirect(route('game', ['roomid' => self::generateCode()]));
    }

    private static function generateCode()
    {
        $base = "FfOoXxIiEe1234567890";
        $result = "";
        for ($i = 0; $i < 6; $i++) {
            $letter = random_int(0, strlen($base) - 1);
            $result .= $base[$letter];
        }
        return $result;
    }
}

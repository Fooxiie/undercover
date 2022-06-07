<?php

namespace App\Http\Controllers;

use App\Events\PlayerJoined;
use App\View\Components\GamePlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        $room = self::generateCode();
        echo Http::post('https://discord.com/api/webhooks/982179970677882922/99b-Lfv1Jbj7u7HXnW5qkjv3b3UixmsVxCqAFk__8sj_bKg553wme446ppNP8Z0EC8IR', [
            'content' => '',
            'embeds' => [
                [
                    'title' => Auth::user()->name." a créé une partie",
                    'description' => "Numéro de salle : ".$room,
                    'color' => '16096779',
                ]
            ],
        ])->status();
        return redirect(route('game', ['roomid' => $room]));
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

    public function render() {
        $message = new GamePlayer(Auth::id());
        event();
        return $message->render();
    }
}

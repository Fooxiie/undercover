<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\View\Components\ChatMessage;
use App\View\Components\NotifMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function render_message(Request $request)
    {
        $message = new ChatMessage($request->query('idUser'), $request->query
        ('message'), $request->query('type'));
        return $message->render();
    }

    public function render_notif(Request $request)
    {
        $notif = new NotifMessage($request->query('idUser'));
        return $notif->render();
    }

    public function sendMessage(Request $request)
    {
        event(new NewChatMessage(Auth::id(), $request->query('message'), $request->query('channel')));
    }
}

<?php

namespace App\Http\Controllers;

use App\View\Components\ChatMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function render_message(Request $request) {
        $message = new ChatMessage($request->query('idUser'), $request->query
        ('message'), $request->query('type'));
        return $message->render();
    }
}

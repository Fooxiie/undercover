<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class ChatMessage extends Component
{
    public string $idUser;
    public string $message;
    public int $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $idUser, string $message, int $type)
    {
        $this->idUser = $idUser;
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $pseudo = User::query()->find($this->idUser)->name;
        if ($this->type == 1) {
            $pseudo .= " : ";
        } else {
            $pseudo .= "   ";
        }
        $message = $this->message;
        $type = $this->type;
        return view('components.chat-message', compact('pseudo', 'message',
            'type'));
    }
}

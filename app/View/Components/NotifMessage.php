<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class NotifMessage extends Component
{
    private string $idUser;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = User::query()->find($this->idUser);
        $avatar = $user->discord_avatar;
        $pseudo = $user->name;
        $message = " a rejoint la partie !";
        return view('components.notif-message', compact('avatar', 'pseudo', 'message'));
    }
}

<?php

namespace App\View\Components;

use http\Client\Curl\User;
use Illuminate\View\Component;

class GamePlayer extends Component
{
    private string $id;

    /**
     * Create a new component instance.
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = \App\Models\User::query()->find($this->id);
        $id = $this->id;
        $avatar = $user->discord_avatar;
        return view('components.game-player', compact('id', 'avatar'));
    }
}

<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $message;
    private $channel;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id, $message, $channel)
    {
        $this->id = $id;
        $this->message = $message;
        $this->channel = $channel;
    }

    public function broadcastOn()
    {
        return [$this->channel];
    }

    public function broadcastAs()
    {
        return 'newChatMessage';
    }
}

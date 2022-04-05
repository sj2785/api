<?php

namespace App\Events;

use App\Services\Crypto\CryptoHandler;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LivePrice implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $crypto;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(CryptoHandler $crypto)
    {
        $this->crypto = $crypto;
    }
    public function broadcastWith()
    {
        $data = $this->crypto->livePrice();
        return $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('channel');
    }
}

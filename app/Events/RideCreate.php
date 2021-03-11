<?php

namespace App\Events;

use App\Http\Resources\Ride\RideResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RideCreate implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ride;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($ride)
    {
        $this->ride = $ride;
    }

    public function broadcastWith()
    {
        return  ['ride' => new RideResource($this->ride)];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('rides');
    }
}

<?php

namespace App\Events;

use App\Http\Resources\Driver\DriverLocationResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DriverLocation implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $driver;

    /**
     * Create a new event instance.
     *
     * @param $driver
     */
    public function __construct($driver)
    {
        $this->driver = $driver;
    }

    public function broadcastWith()
    {
        return  [
            'location' => new DriverLocationResource($this->driver)
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('driver.'.$this->driver->id);
    }
}

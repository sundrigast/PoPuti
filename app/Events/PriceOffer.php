<?php

namespace App\Events;

use App\Http\Resources\Ride\OfferResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PriceOffer implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $offer;

    /**
     * Create a new event instance.
     *
     * @param $offer
     */
    public function __construct($offer)
    {
        $this->offer = $offer;
    }

    public function broadcastWith()
    {
        return  ['offer' => new OfferResource($this->offer)];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('ride.'.$this->offer->ride_id);
    }
}

<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ExcavatorUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $excavator;

    public function __construct($excavator)
    {
        $this->excavator = $excavator;
        Log::info('ExcavatorUpdated event dispatched with data: ', [$excavator]);
    }

    public function broadcastWith(): array
    {
        return ['message' => $this->excavator];
    }
    
    public function broadcastOn(): array
    {
        return [
            new Channel('messages'),
        ];
    }
}
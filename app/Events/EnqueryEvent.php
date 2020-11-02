<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EnqueryEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $details;
    public $email;
    public $subject;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($details,$email,$subject)
    {
        $this->details = $details;
        $this->email = $email;
        $this->subject =$subject;
    }

    // /**
    //  * Get the channels the event should broadcast on.
    //  *
    //  * @return \Illuminate\Broadcasting\Channel|array
    //  */
    // public function broadcastOn()
    // {
    //     return new PrivateChannel('channel-name');
    // }
}

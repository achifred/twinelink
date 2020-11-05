<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\LinkImpression;
use Session;
class LinkViewEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        try {
          
         LinkImpression::create(['user_id'=>$event->user_id,'impression_count'=>1]);
        
        } catch (\Throwable $th) {
            //throw $th;
        }
        
        
    }
}

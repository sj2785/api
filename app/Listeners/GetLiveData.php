<?php

namespace App\Listeners;

use App\Events\LivePrice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GetLiveData
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
     * @param  \App\Events\LivePrice  $event
     * @return void
     */
    public function handle(LivePrice $event)
    {
        $event->crypto->livePrice();
    }
}

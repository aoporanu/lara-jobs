<?php

namespace App\Listeners;

use App\Events\JobDeletedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobDeleted
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
     * @param JobDeletedEvent $event
     * @return void
     */
    public function handle(JobDeletedEvent $event)
    {
        if(true) {
            $this->release(30);
        }
    }
}

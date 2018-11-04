<?php

namespace App\Listeners;

use App\Events\JobCreated as JobCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobCreated
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
     * @param JobCreatedEvent $event
     * @return void
     */
    public function handle(JobCreatedEvent $event)
    {
        //
    }
}

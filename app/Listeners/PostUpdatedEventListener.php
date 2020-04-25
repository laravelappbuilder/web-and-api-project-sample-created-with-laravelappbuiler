<?php

namespace App\Listeners;

use App\Events\PostUpdatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\PostUpdatedMail;
use App\Notifications\PostUpdatedNotification;

class PostUpdatedEventListener implements ShouldQueue
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
     * @param  PostUpdatedEventListener  $event
     * @return void
     */
    public function handle(PostUpdatedEvent $event)
    {
        Mail::to($event->post->user->email)->queue(new PostUpdatedMail());
				$event->post->user->notify(new PostUpdatedNotification);
				
    }
}

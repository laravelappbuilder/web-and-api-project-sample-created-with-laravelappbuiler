<?php

namespace App\Listeners;

use App\Events\PostCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\PostCreatedMail;
use App\Notifications\PostCreatedNotification;

class PostCreatedEventListener implements ShouldQueue
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
     * @param  PostCreatedEventListener  $event
     * @return void
     */
    public function handle(PostCreatedEvent $event)
    {
        Mail::to($event->post->user->email)->queue(new PostCreatedMail());
				$event->post->user->notify(new PostCreatedNotification);
				
    }
}

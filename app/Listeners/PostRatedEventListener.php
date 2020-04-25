<?php

namespace App\Listeners;

use App\Events\PostRatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\PostRatedMail;
use App\Notifications\PostRatedNotification;

class PostRatedEventListener implements ShouldQueue
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
     * @param  PostRatedEventListener  $event
     * @return void
     */
    public function handle(PostRatedEvent $event)
    {
        Mail::to($event->rating->user->email)->queue(new PostRatedMail());
				$event->rating->user->notify(new PostRatedNotification);
				
    }
}

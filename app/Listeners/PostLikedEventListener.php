<?php

namespace App\Listeners;

use App\Events\PostLikedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\PostLikedMail;
use App\Notifications\PostLikedNotification;

class PostLikedEventListener implements ShouldQueue
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
     * @param  PostLikedEventListener  $event
     * @return void
     */
    public function handle(PostLikedEvent $event)
    {
        Mail::to($event->like->user->email)->queue(new PostLikedMail());
				$event->like->user->notify(new PostLikedNotification);
				
    }
}

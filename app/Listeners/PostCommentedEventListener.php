<?php

namespace App\Listeners;

use App\Events\PostCommentedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\PostCommentedMail;
use App\Notifications\PostCommentedNotification;

class PostCommentedEventListener implements ShouldQueue
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
     * @param  PostCommentedEventListener  $event
     * @return void
     */
    public function handle(PostCommentedEvent $event)
    {
        Mail::to($event->comment->user->email)->queue(new PostCommentedMail());
				$event->comment->user->notify(new PostCommentedNotification);
				
    }
}

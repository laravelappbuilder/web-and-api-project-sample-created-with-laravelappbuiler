<?php

namespace App\Observers;

use App\Like;
use Auth;
use Event;

class LikeObserver
{
    /**
     * Handle the Like "creating" event.
     *
     * @param  \App\Like  $like
     * @return void
     */
    public function creating(Like $like)
    {
        $like->user_id = auth()->user()->id;
    }

    /**
     * Handle the Like "created" event.
     *
     * @param  \App\Like  $like
     * @return void
     */
    public function created(Like $like)
    {
        Event::dispatch(new \App\Events\PostLikedEvent($like));
				
    }

    /**
     * Handle the Like "updating" event.
     *
     * @param  \App\Like  $like
     * @return void
     */
    public function updating(Like $like)
    {
        //
    }

    /**
     * Handle the Like "updated" event.
     *
     * @param  \App\Like  $like
     * @return void
     */
    public function updated(Like $like)
    {
        //
    }

    /**
     * Handle the Like "deleting" event.
     *
     * @param  \App\Like  $like
     * @return void
     */
    public function deleting(Like $like)
    {
        //
    }

    /**
     * Handle the Like "deleted" event.
     *
     * @param  \App\Like  $like
     * @return void
     */
    public function deleted(Like $like)
    {
        //
    }

    /**
     * Handle the Like "Restoring" event.
     *
     * @param  \App\Like  $like
     * @return void
     */
    public function restoring(Like $like)
    {
        //
    }

    /**
     * Handle the Like "restored" event.
     *
     * @param  \App\Like  $like
     * @return void
     */
    public function restored(Like $like)
    {
        //
    }

    /**
     * Handle the Like "force deleted" event.
     *
     * @param  \App\Like  $like
     * @return void
     */
    public function forceDeleted(Like $like)
    {
        //
    }
}

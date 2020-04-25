<?php

namespace App\Observers;

use App\Rating;
use Auth;
use Event;

class RatingObserver
{
    /**
     * Handle the Rating "creating" event.
     *
     * @param  \App\Rating  $rating
     * @return void
     */
    public function creating(Rating $rating)
    {
        $rating->user_id = auth()->user()->id;
    }

    /**
     * Handle the Rating "created" event.
     *
     * @param  \App\Rating  $rating
     * @return void
     */
    public function created(Rating $rating)
    {
        Event::dispatch(new \App\Events\PostRatedEvent($rating));
				
    }

    /**
     * Handle the Rating "updating" event.
     *
     * @param  \App\Rating  $rating
     * @return void
     */
    public function updating(Rating $rating)
    {
        //
    }

    /**
     * Handle the Rating "updated" event.
     *
     * @param  \App\Rating  $rating
     * @return void
     */
    public function updated(Rating $rating)
    {
        //
    }

    /**
     * Handle the Rating "deleting" event.
     *
     * @param  \App\Rating  $rating
     * @return void
     */
    public function deleting(Rating $rating)
    {
        //
    }

    /**
     * Handle the Rating "deleted" event.
     *
     * @param  \App\Rating  $rating
     * @return void
     */
    public function deleted(Rating $rating)
    {
        //
    }

    /**
     * Handle the Rating "Restoring" event.
     *
     * @param  \App\Rating  $rating
     * @return void
     */
    public function restoring(Rating $rating)
    {
        //
    }

    /**
     * Handle the Rating "restored" event.
     *
     * @param  \App\Rating  $rating
     * @return void
     */
    public function restored(Rating $rating)
    {
        //
    }

    /**
     * Handle the Rating "force deleted" event.
     *
     * @param  \App\Rating  $rating
     * @return void
     */
    public function forceDeleted(Rating $rating)
    {
        //
    }
}

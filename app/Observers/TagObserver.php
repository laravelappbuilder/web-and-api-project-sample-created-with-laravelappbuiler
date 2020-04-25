<?php

namespace App\Observers;

use App\Tag;
use Auth;
use Event;

class TagObserver
{
    /**
     * Handle the Tag "creating" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function creating(Tag $tag)
    {
        $tag->user_id = auth()->user()->id;
    }

    /**
     * Handle the Tag "created" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function created(Tag $tag)
    {
        //
    }

    /**
     * Handle the Tag "updating" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function updating(Tag $tag)
    {
        //
    }

    /**
     * Handle the Tag "updated" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function updated(Tag $tag)
    {
        //
    }

    /**
     * Handle the Tag "deleting" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function deleting(Tag $tag)
    {
        //
    }

    /**
     * Handle the Tag "deleted" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function deleted(Tag $tag)
    {
        //
    }

    /**
     * Handle the Tag "Restoring" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function restoring(Tag $tag)
    {
        //
    }

    /**
     * Handle the Tag "restored" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function restored(Tag $tag)
    {
        //
    }

    /**
     * Handle the Tag "force deleted" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function forceDeleted(Tag $tag)
    {
        //
    }
}

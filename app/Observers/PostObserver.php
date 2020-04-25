<?php

namespace App\Observers;

use App\Post;
use Auth;
use Event;
use Image;
use Illuminate\Support\Str;


class PostObserver
{
    /**
     * Handle the Post "creating" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function creating(Post $post)
    {
        $post->user_id = auth()->user()->id;
				if (Post::where('slug',Str::slug($post->title))->first()==null) {
					$slug = Str::slug($post->title);
				}else {
					$slug = Str::slug($post->title).'-'.uniqid();
				}
				$post->slug = $slug;
				if(request()->hasFile('coverimage')){
					$coverimage = uniqid().time().'.'.request()->file('coverimage')->getClientOriginalExtension();
					Image::make(request()->file('coverimage'))->save(public_path('images/'.$coverimage));
					$post->coverimage = $coverimage;
				}
    }

    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        Event::dispatch(new \App\Events\PostCreatedEvent($post));
				
    }

    /**
     * Handle the Post "updating" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function updating(Post $post)
    {
        if ($post->getOriginal('title')!=$post->title) {
					if (Post::where('slug',Str::slug($post->title))->first()==null) {
						$post->slug = Str::slug($post->title);
					}else {
						$post->slug = Str::slug($post->title).'-'.uniqid();
					}
				}
				if(request()->hasFile('coverimage')){
					if($post->getOriginal('coverimage')!=null){
						File::delete(public_path('images/'.$post->getOriginal('coverimage')));
					}
					$coverimage = uniqid().time().'.'.request()->file('coverimage')->getClientOriginalExtension();
					Image::make(request()->file('coverimage'))->save(public_path('images/'.$coverimage));
					$post->coverimage = $coverimage;
				}
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        Event::dispatch(new \App\Events\PostUpdatedEvent($post));
				
    }

    /**
     * Handle the Post "deleting" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleting(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the Post "Restoring" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function restoring(Post $post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}

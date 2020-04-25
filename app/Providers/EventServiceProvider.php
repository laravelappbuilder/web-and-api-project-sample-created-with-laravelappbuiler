<?php

namespace App\Providers;

use App\Events\PostCreatedEvent;
use App\Events\PostUpdatedEvent;
use App\Events\PostCommentedEvent;
use App\Events\PostLikedEvent;
use App\Events\PostRatedEvent;
use App\Listeners\PostCreatedEventListener;
use App\Listeners\PostUpdatedEventListener;
use App\Listeners\PostCommentedEventListener;
use App\Listeners\PostLikedEventListener;
use App\Listeners\PostRatedEventListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        PostCreatedEvent::class => [
						PostCreatedEventListener::class,
				],PostUpdatedEvent::class => [
						PostUpdatedEventListener::class,
				],PostCommentedEvent::class => [
						PostCommentedEventListener::class,
				],PostLikedEvent::class => [
						PostLikedEventListener::class,
				],PostRatedEvent::class => [
						PostRatedEventListener::class,
				],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

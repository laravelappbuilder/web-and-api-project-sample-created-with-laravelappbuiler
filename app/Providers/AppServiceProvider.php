<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     public function boot()
     {
         Schema::defaultStringLength(191);
         \App\Role::observe(\App\Observers\RoleObserver::class);
			\App\Category::observe(\App\Observers\CategoryObserver::class);
			\App\Post::observe(\App\Observers\PostObserver::class);
			\App\Comment::observe(\App\Observers\CommentObserver::class);
			\App\Like::observe(\App\Observers\LikeObserver::class);
			\App\Rating::observe(\App\Observers\RatingObserver::class);
			\App\Tag::observe(\App\Observers\TagObserver::class);
			
     }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

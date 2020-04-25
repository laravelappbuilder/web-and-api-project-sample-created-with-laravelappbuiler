<?php

namespace App\Providers;

use App\Role;
use App\Category;
use App\Post;
use App\Comment;
use App\Like;
use App\Rating;
use App\Tag;
use App\Policies\RolePolicy;
use App\Policies\CategoryPolicy;
use App\Policies\PostPolicy;
use App\Policies\CommentPolicy;
use App\Policies\LikePolicy;
use App\Policies\RatingPolicy;
use App\Policies\TagPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Role::class => RolePolicy::class,
				Category::class => CategoryPolicy::class,
				Post::class => PostPolicy::class,
				Comment::class => CommentPolicy::class,
				Like::class => LikePolicy::class,
				Rating::class => RatingPolicy::class,
				Tag::class => TagPolicy::class,
				
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
    }
}

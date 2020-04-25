<?php

use Faker\Generator as Faker;

$factory->define(App\Like::class, function (Faker $faker) {
    return [
        'user_id' => function(){ return factory(App\User::class)->create()->id;},
				'post_id' => function(){ return factory(App\Post::class)->create()->id;},
				'like' => $faker->numberBetween(1,50),
				
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Rating::class, function (Faker $faker) {
    return [
        'user_id' => function(){ return factory(App\User::class)->create()->id;},
				'post_id' => function(){ return factory(App\Post::class)->create()->id;},
				'rating' => $faker->numberBetween(1,50),
				
    ];
});

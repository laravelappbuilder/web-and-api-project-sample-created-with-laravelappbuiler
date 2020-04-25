<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => function(){ return factory(App\User::class)->create()->id;},
				'post_id' => function(){ return factory(App\Post::class)->create()->id;},
				'comment' => $faker->paragraphs(rand(5,10),true),
				
    ];
});

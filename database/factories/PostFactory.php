<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => function(){ return factory(App\User::class)->create()->id;},
				'category_id' => function(){ return factory(App\Category::class)->create()->id;},
				'coverimage' => $faker->image($dir = public_path('images/'),$width = 800,$height = 400,'cats',false),
				'slug' => Str::slug($faker->unique()->sentence().'-'.uniqid()),
				'title' => $faker->sentence(),
				'body' => $faker->paragraphs(rand(5,10),true),
				
    ];
});

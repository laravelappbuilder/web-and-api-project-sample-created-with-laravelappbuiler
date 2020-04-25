<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Comment::unsetEventDispatcher();
        factory('App\Comment',50)->create();
    }
}

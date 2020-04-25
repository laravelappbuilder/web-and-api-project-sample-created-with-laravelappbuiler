<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Tag::unsetEventDispatcher();
        factory('App\Tag',50)->create();
    }
}

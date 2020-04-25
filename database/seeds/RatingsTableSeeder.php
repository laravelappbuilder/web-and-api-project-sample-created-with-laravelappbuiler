<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Rating::unsetEventDispatcher();
        factory('App\Rating',50)->create();
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ratings', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedBigInteger('user_id');
					$table->unsignedInteger('post_id');
					$table->integer('rating',50);
					$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
					$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
					$table->softDeletes();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}

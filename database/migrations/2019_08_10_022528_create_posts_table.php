<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('posts', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedBigInteger('user_id');
					$table->unsignedInteger('category_id');
					$table->string('coverimage')->nullable();
					$table->string('title');
					$table->string('slug')->unique();
					$table->string('body',10000);
					$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
					$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}

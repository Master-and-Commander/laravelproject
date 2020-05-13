<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpiderBuddiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spider_buddies', function (Blueprint $table) {
          $table->bigIncrements('spiderbuddy_id');
          $table->integer('spider_id');
          $table->integer('user_id');
          $table->boolean('active');
          $table->string('buddy_name', 25);
          $table->string('description', 750);
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
        Schema::dropIfExists('spider_buddies');
    }
}

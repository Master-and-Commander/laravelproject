<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spiders', function (Blueprint $table) {
          $table->bigIncrements('spider_id');
          $table->string('species_name', 25);
          $table->string('family_name', 25);
          $table->string('description', 750);
          $table->string('habitat', 25);
          $table->integer('toxicity');
          $table->integer('size');
          $table->boolean('canabilistic');
          $table->boolean('burrower');
          $table->boolean('climber');
          $table->integer('humidity');
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
        Schema::dropIfExists('spiders');
    }
}

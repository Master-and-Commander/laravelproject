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
          $table->bigIncrements('scorpion_id');
          $table->string('species_name', 25);
          $table->string('family_name', 25);
          $table->multiLineString('description');
          $table->string('habitat', 25);
          $table->integer('toxicity');
          $table->integer('size');
          $table->boolean('canabilistic');
          $table->boolean('burrower');
          $table->boolean('climber');
          $table->integer('humidity');
          $table->string('order', 25);
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

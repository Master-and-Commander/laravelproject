<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish', function (Blueprint $table) {
          $table->bigIncrements('fish_id');
          $table->string('species_name', 25);
          $table->string('family_name', 25);
          $table->string('description', 750);
          $table->string('common_name', 25);
          $table->string('habitat', 25);
          $table->integer('pH');
          $table->integer('oxygen');
          $table->string('temperature',25);
          $table->string('water_type',25);
          $table->string('food_type',25);
          $table->string('harvest_size', 25);
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
        Schema::dropIfExists('fishes');
        Schema::dropIfExists('fish');
    }
}

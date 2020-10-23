<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
          $table->bigIncrements('plant_id');
          $table->string('common_name', 25);
          $table->string('species_name', 25);
          $table->string('family_name', 25);
          $table->string('description', 750);
          $table->string('habitat', 25);
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
        Schema::dropIfExists('plants');
    }
}

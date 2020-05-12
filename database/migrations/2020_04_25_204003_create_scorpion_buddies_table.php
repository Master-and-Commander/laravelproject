<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScorpionBuddiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scorpion_buddies', function (Blueprint $table) {
            $table->bigIncrements('scorpionbuddy_id');
            $table->foreignId('scorpion_id');
            $table->foreignId('user_id');
            $table->boolean('active');
            $table->string('buddy_name', 25);
            $table->timestamps();
            $table->multiLineString('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scorpion_buddies');
    }
}

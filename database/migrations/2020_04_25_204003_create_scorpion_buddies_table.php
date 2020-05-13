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
            $table->integer('scorpion_id');
            $table->integer('user_id');
            $table->boolean('active');
            $table->string('buddy_name', 25);
            $table->timestamps();
            $table->string('description', 755);
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

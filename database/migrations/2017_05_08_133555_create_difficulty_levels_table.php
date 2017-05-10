<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDifficultyLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('difficulty_levels', function(Blueprint $table) {
      // -- standard Laravel fields
        $table->increments('id');
        $table->timestamps();

      // -- custom database fields
        $table->string('difficulty_level');
    });

  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('difficulty_levels');
    }
}

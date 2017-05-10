<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectCountriesAndDifficultyLevelTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function(Blueprint $table) {
        // -- custom field to connect countries to difficulty level
          $table->integer('difficulty_level_id')->unsigned();

        // -- creating a foreign key relationship btw countries and difficulty level
          $table->foreign('difficulty_level_id')->references('id')->on('difficulty_levels');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('countries', function(Blueprint $table) {
            $table->dropForeign('countries_difficulty_level_id_foreign');
            $table->dropColumn('difficulty_level_id');
          });
    }
}

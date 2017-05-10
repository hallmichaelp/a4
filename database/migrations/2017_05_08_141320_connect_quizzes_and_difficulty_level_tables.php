<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectQuizzesAndDifficultyLevelTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('quizzes', function(Blueprint $table) {
      // -- custom field to connect quizzes to difficulty level
        $table->integer('difficulty_level_id')->unsigned();

      // -- creating a foreign key relationship btw quizzes and difficulty level
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
      Schema::table('quizzes', function(Blueprint $table) {
        $table->dropForeign('quizzes_difficulty_level_id_foreign');
        $table->dropColumn('difficulty_level_id');
      });
    }
}

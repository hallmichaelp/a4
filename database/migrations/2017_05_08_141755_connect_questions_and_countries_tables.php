<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectQuestionsAndCountriesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('questions', function(Blueprint $table) {
      // -- custom field to connect questions to countries
        $table->integer('country_id')->unsigned();

      // -- creating a foreign key relationship btw questions and countries
        $table->foreign('country_id')->references('id')->on('countries');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('questions', function(Blueprint $table) {
        $table->dropForeign('questions_country_id_foreign');
        $table->dropColumn('country_id');
      });
    }
}

<?php

Route::get('/', 'StartController@showStart');
Route::post('/quiz', 'QuizController@showQuiz');
Route::post('/result', 'ResultController@showResult');

if(App::environment('local')) {

    Route::get('/drop', function() {

        $db = Config::get('database.connections.mysql.database');

        DB::statement('DROP database '.$db);
        DB::statement('CREATE database '.$db);

        return 'Dropped '.$db.'; created '.$db.'.';
    });

};

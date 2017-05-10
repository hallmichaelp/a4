<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
  // -- Adding a statement to tell Laravel the name of the corresponding DB table
    protected $table = 'quizzes';

  // -- Method to establish quiz one to one relationship with difficulty level
    public function difficulty_level() {
      return $this->hasOne('App\DifficultyLevel');
    }

  // -- Method to establish quiz one to many relationship with question
    public function questions() {
      return $this->hasMany('App\Question');
    }

}

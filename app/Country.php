<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  // -- Adding a statement to tell Laravel the name of the corresponding DB table
    protected $table = 'countries';

  // -- Method to establish country one to one relationship with difficulty level
    public function difficulty_level() {
      return $this->hasOne('App\DifficultyLevel');
    }

  // -- Method to establish country one to one relationship with question
    public function question() {
      return $this->belongsTo('App\Question');
    }
}

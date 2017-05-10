<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DifficultyLevel extends Model
{
  // -- Adding a statement to tell Laravel the name of the corresponding DB table
    protected $table = 'difficulty_levels';

  // -- Method to establish difficulty level one to one relationship with country
    public function country() {
      return $this->belongsTo('App\Country');
    }

  // -- Method to establish difficulty level one to one relationship with quiz
    public function quiz() {
      return $this->belongsTo('App\Quiz');
  }
}

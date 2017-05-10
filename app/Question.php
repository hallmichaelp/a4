<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  // -- Method to establish question many to one relationship with quiz
    public function quiz() {
      return $this->belongsTo('App\Quiz');
    }

  // -- Method to establish question one to one relationship with country
    public function country() {
      return $this->hasOne('App\Country');
    }
}

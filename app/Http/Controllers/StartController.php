<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
  public function showStart() {
    return view('quiz.start');
  }
}

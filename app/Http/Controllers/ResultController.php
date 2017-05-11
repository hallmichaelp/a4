<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\QuizGrader;

class ResultController extends Controller
{
  public function showResult(Request $request) {

    // -- Instantiate new QuizGrader object and passing in user form data
    $newQuizGrader = new QuizGrader($request->all());

    // -- Returning the resi;t view and passing the view necessary data for presentation
    return view('quiz.result')->with([
      'answers'=>$request->all(),
      'totalquestions'=>$newQuizGrader->getTotalQuestions(),
      'quizid'=>$newQuizGrader->getQuizId(),
      'useranswers'=>$newQuizGrader->getUserAnswers(),
      'countryids'=>$newQuizGrader->getCountryIds(),
      'numanswerscorrect'=>$newQuizGrader->getNumAnswersCorrect(),
      'countrydata'=>$newQuizGrader->getCountryData()
    ]);
  }
}

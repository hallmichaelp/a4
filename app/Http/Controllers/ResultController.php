<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\QuizGrader;

class ResultController extends Controller
{
  public function showResult(Request $request) {
    $newQuizGrader = new QuizGrader($request->all());
    return view('quiz.result')->with([
      'answers'=>$request->all(),
      'totalquestions'=>$newQuizGrader->getTotalQuestions(),
      'quizid'=>$newQuizGrader->getQuizId(),
      'useranswers'=>$newQuizGrader->getUserAnswers(),
      'countryids'=>$newQuizGrader->getCountryIds(),
      'numanswerscorrect'=>$newQuizGrader->getNumAnswersCorrect(),
      'countrydata'=>$newQuizGrader->getCountryData()
      //'correctanswers'=>$result->getCorrectAnswers(),

    ]);
  }
}

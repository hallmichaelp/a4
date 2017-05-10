<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\QuizCreator;
use App\Quiz;

class QuizController extends Controller
{

  public function showQuiz(Request $request) {

    $this->validate($request, [
      'difficulty_level'=> 'required',
      'num_of_questions'=> 'required|integer|between:5,12'
    ]);

    // -- Instantiate new QuizCreator object and passing in user form data
    $newQuizCreator = new QuizCreator($request->input('difficulty_level'), $request->input('num_of_questions'));

    // -- Returning the quiz view and passing the view necessary data for presentation
    return view('quiz.quiz')->with([
      'questionsetfull'=>$newQuizCreator->getQuestionSetFull(),
      'wronganswers'=>$newQuizCreator->getWrongAnswers(),
      //'hints'=>$newQuizCreator->getHints(),
      'difficulty'=>$newQuizCreator->getDifficultyLevel(),
      'answerchoices'=>$newQuizCreator->getAnswerChoices(),
      'quizid'=>$newQuizCreator->getQuizId()
    ]);
  }
}

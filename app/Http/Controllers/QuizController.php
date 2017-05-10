<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\QuizCreator;
use App\Quiz;

class QuizController extends Controller
{

  public function showQuiz(Request $request) {

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

  // -- Practice functions

  public function showPractice(Request $request) {
    $newQuiz = new Quiz();
    $newQuiz->difficulty_level = 1;
    $newQuiz->num_of_questions = $request->input('num_of_questions');
    $newQuiz->save();
    dump($newQuiz->toArray());
  }

  public function showPracticeTwo() {
    $quiz = new Quiz();
    $quizzes = $quiz->all();

    dump($quizzes->toArray());
  }

  public function showPracticeThree() {
    $quiz = new Quiz();
    $quizzes = $quiz->where('num_of_questions','>', 8)->get();
    dump($quizzes->toArray());
  }

  public function showPracticeFour(Request $request) {
    $quiz = new Quiz();
    $quizzes = $quiz->where('num_of_questions','=',$request->input('num_of_questions'))->get();
    dump($quizzes->toArray());
  }

  public function showPracticeFive() {
    $quiz = new Quiz();
    $quizzes = $quiz->where('num_of_questions','=',7)->first();

    $quizzes->num_of_questions = 5;
    $quizzes->save();

    dump('Complete. Check DB for change.');
  }

  public function showPracticeSix(Request $request) {
    $newQuiz = new Quiz();
    $newQuiz->difficulty_level = 1;
    $newQuiz->num_of_questions = $request->input('num_of_questions');
    $newQuiz->save();
    $quizzes = $newQuiz->all();
    echo $quizzes;
  }
}

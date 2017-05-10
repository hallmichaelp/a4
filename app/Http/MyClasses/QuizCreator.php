<?php namespace App\MyClasses;

use App\Country;
use App\Quiz;
use App\Question;

class QuizCreator
  {

  // -- Class properties

  // -- Setting these properties with data from the form

    private $difficulty;
    private $length;

  // --

    private $questionSetFull = [];
    private $wrongAnswers = [];
    private $answerChoices = [];
  //  private $hints = [];
    private $quizId;

  // -- Class methods
  // -- Getter method for retrieving the quiz

    public function getQuestionSetFull() {
      return $this->questionSetFull;
    }

    public function getWrongAnswers() {
      return $this->wrongAnswers;
    }

    public function getAnswerChoices() {
      return $this->answerChoices;
    }

    // public function getHints() {
    //   return $this->hints;
    // }

    public function getDifficultyLevel() {
      return $this->difficulty;
    }

    public function getQuizId() {
      return $this->quizId;
    }

    // -- Setter methods for setting class properties
    // -- This setter method converts the incoming string to an integer to match the DB values

    private function setDifficultyLevel($inputDifficulty) {
      $difficultyBucket = '';
      switch ($inputDifficulty) {
        case 'easy':
          $difficultyBucket = 1;
          break;
        case 'moderate':
          $difficultyBucket = 2;
          break;
        case 'hard':
          $difficultyBucket = 3;
          break;
      }
      return $difficultyBucket;
    }

  // -- Constructor method to instantiate the object, set two properties,
  // -- and call the class methods to generate the components of the quiz

    public function __construct($inputDifficulty, $inputLength) {
      $this->difficulty = $this->setDifficultyLevel($inputDifficulty);
      $this->length = $inputLength;
      $this->createQuiz();
      $this->createQuestions();
      $this->createWrongAnswers();
      $this->createAnswerChoices();
      //$this->createHints();
    }

  // -- Method to create a new quiz record in the quizzes table

    private function createQuiz() {

      $newQuiz = new Quiz();
      $newQuiz->difficulty_level_id = $this->difficulty;
      $newQuiz->num_of_questions = $this->length;
      $newQuiz->save();

      $this->quizId = $newQuiz->id;
    }

  // -- Method to create new question records in the questions table

    private function createQuestions() {

      $newCountry = new Country();
      $unfilteredQuestionSet = $newCountry->all()->toArray();
      $filteredQuestionSet = [];

      // -- Looping through all countries and extracting only those that match the chosen difficulty level
       for ($i=0; $i < count($unfilteredQuestionSet); $i++) {
         if ($unfilteredQuestionSet[$i]['difficulty_level_id'] == $this->difficulty) {
           array_push($filteredQuestionSet, $unfilteredQuestionSet[$i]);
         }
       }

      // -- Shuffling the filtered array and reducing the number of questions in the array to what was
      // -- requested by the user
       shuffle($filteredQuestionSet);
       $this->questionSetFull = array_slice($filteredQuestionSet, 0, $this->length);

      for ($i=0; $i < count($this->questionSetFull) ; $i++) {
        $newQuestion = new Question();
        $newQuestion->quiz_id = $this->quizId;
        $newQuestion->country_id = $this->questionSetFull[$i]['id'];
        //$newQuestion->user_answer = '';
        $newQuestion->save();
      }
    }

    // -- Method to create an array of incorrect answers for populating the list controls

    private function createWrongAnswers() {

      $newCountry = new Country();
      $this->wrongAnswers = $newCountry->pluck('capital')->toArray();

      // -- Removing the correct answers from the wrongAnswers array

         for ($i=0; $i < $this->length ; $i++) {
           $correctAnswerKey = array_search($this->questionSetFull[$i]['capital'], $this->wrongAnswers);
           unset($this->wrongAnswers[$correctAnswerKey]);
         }
      shuffle($this->wrongAnswers);
      return $this->wrongAnswers;
    }

     private function createAnswerChoices() {
    // -- Looping through quiz question set and adding in three incorrect answers
    // -- to be included in the quiz along with the right answer
      shuffle($this->wrongAnswers);
      $wrongAnswerChunks = array_chunk($this->wrongAnswers, 3);

      for ($i=0; $i < $this->length; $i++) {
        $oneChunk = array_shift($wrongAnswerChunks);
        array_push($oneChunk, $this->questionSetFull[$i]['capital']);
        shuffle($oneChunk);
        array_push($this->answerChoices, $oneChunk);
      }
         return $this->answerChoices;
     }

    // private function createHints() {
    //   $hintBucket = [];
    //   for ($i=0; $i < $this->length ; $i++) {
    //     for ($j=0; $j < count($this->answerChoices[$i]) ; $j++) {
    //       if ($this->answerChoices[$i][$j] !== $this->questionSetFull[$i]['capital']) {
    //         array_push($hintBucket, $this->answerChoices[$i][$j]);
    //       }
    //     }
    //       $this->hints = array_chunk($hintBucket, 3);
    //   }
    //       return $this->hints;
    // }
}

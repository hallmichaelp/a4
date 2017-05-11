<?php namespace App\MyClasses;

use App\Country;
use App\Quiz;
use App\Question;

class QuizGrader
  {

    // -- Class properties

      private $totalQuestions;
      private $rawUserAnswers;
      private $correctAnswers;
      private $countryIds;
      private $quizId;
      private $numAnswersCorrect;
      private $countryData;

    // -- Class methods
    // -- Class constructor method

      public function __construct($inputUserAnswers) {
        $this->totalQuestions = count($inputUserAnswers) - 1;
        $this->rawUserAnswers = $inputUserAnswers;
        $this->userAnswers = $this->setUserAnswers();
        $this->quizId = $this->setQuizId();
        $this->addUserAnswers();
        $this->countryIds = $this->setCountryIds();
        $this->numAnswersCorrect = $this->setNumAnswersCorrect();
        $this->countryData = $this->setCountryData();
      }

    // -- Getter methods to retrieve private class properties

      public function getTotalQuestions() {
        return $this->totalQuestions;
      }

      public function getQuizId() {
        return $this->quizId;
      }

      public function getUserAnswers() {
        return $this->userAnswers;
      }

      public function getCountryIds() {
        return $this->countryIds;
      }

      public function getNumAnswersCorrect() {
        return $this->numAnswersCorrect;
      }

      public function getCountryData() {
        return $this->countryData;
      }

      // -- Setter methods for establishing class properties

      // -- Method pulls in the quiz ID from the form post data and saves it

      private function setQuizId() {
        array_shift($this->rawUserAnswers);
        $keyHolder = key($this->rawUserAnswers);
        $splitKeyHolder = explode('_', $keyHolder);
        $quizId = $splitKeyHolder[0];
        return $quizId;
      }

      // -- Method extracts only the user answers from the form post data

      private function setUserAnswers() {

        $onlyAnswers = array_values($this->rawUserAnswers);
        unset($onlyAnswers[0]);
        return $onlyAnswers;
      }

      // -- Method extracts the country IDs from the form post data

      private function setCountryIds() {
        $countryIdBucket = [];

        $keyBucket = array_keys($this->rawUserAnswers);

        for ($i=0; $i < $this->totalQuestions ; $i++) {
          $keyHolder = array_shift($keyBucket);
          $splitKeyHolder = explode('_', $keyHolder);
          $countryId = array_pop($splitKeyHolder);
          array_push($countryIdBucket, $countryId);
        }
        return $countryIdBucket;
      }

      // -- Method calculates the number of correct quiz answers

      private function setNumAnswersCorrect() {
        $numAnswersCorrect = 0;

        for ($i=0; $i < $this->totalQuestions ; $i++) {
          $newCountry = new Country();
          $retrievedRecord = $newCountry->where('id', '=', $this->countryIds[$i])->first();
          $correctAnswer = $retrievedRecord['capital'];

            if ($this->userAnswers[$i + 1] == $correctAnswer) {
              ++$numAnswersCorrect;
            }
        }
        return $numAnswersCorrect;
      }

      // -- Method pulls down countries table data for use in the results blade file

      private function setCountryData() {

        $countryData = [];
        $countryDataBucket = [];

        for ($i=0; $i < $this->totalQuestions; $i++) {

          $newCountry = new Country();
          $retrievedRecord = $newCountry->where('id', '=', $this->countryIds[$i])->first();
          $countryData = array($retrievedRecord['name'], $retrievedRecord['capital']);
          array_push($countryDataBucket, $countryData);
      }
        return $countryDataBucket;
    }

      // -- Method to update the questions table with user answers

      private function addUserAnswers() {

        for ($i=0; $i < $this->totalQuestions; $i++) {
          $newUserAnswer = new Question();
          $newUserAnswer->where('quiz_id', '=', $this->quizId)->where('country_id', '=', $this->countryIds[$i])->update(['user_answer' => $this->userAnswers[$i+1]]);
        }
      }
  }

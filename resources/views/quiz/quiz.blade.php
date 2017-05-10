@extends('layouts.master')

@section('title')
  Your Quiz
@endsection

@section('content')

   <!-- Page Instructions -->

   <aside>
     <h4>Identify each country's capital city. Use the "Help" button as needed.</h4>
   </aside>

   <!-- Start of the Form -->

   <form method='POST' action='/result'>

     {{ csrf_field() }}

     <!-- Quiz Questions -->

     @foreach($questionsetfull as $group => $property)
      <div class="row questionRow">
        <div class="eight columns">
          <label class="questionLabel" for="question_{{ $group }}">{{ $property['name'] }}</label>
            <select class="questionSelect" id="question_{{ $group }}" name="{{ $quizid }}_{{ $property['id'] }}">
                <option value="empty"></option>
                <option value="{{ $answerchoices[$group][0] }}">{{ $answerchoices[$group][0] }}</option>
                <option value="{{ $answerchoices[$group][1] }}">{{ $answerchoices[$group][1] }}</option>
                <option value="{{ $answerchoices[$group][2] }}">{{ $answerchoices[$group][2] }}</option>
                <option value="{{ $answerchoices[$group][3] }}">{{ $answerchoices[$group][3] }}</option>
            </select>

            <input name="button_{{ $group }}" class="button button-hint" type="button" value="Help" onclick="window.open('{{ $questionsetfull[$group]['wiki_link'] }}')">

        </div>
      </div>
      @endforeach

       <div class="row">
         <div class="twelve columns">
           <input class="button-primary button-extend" type="submit" value="Submit Quiz">
         </div>
       </div>

       </form>

       <!-- End of the Form -->

       <!-- Need to delete this section -->
         <p>Question Set Full</p>
         <?php dump($questionsetfull); ?>
         <p>Wrong Answers</p>
         <?php dump($wronganswers); ?>
         <p>Answer Choices</p>
         <?php dump($answerchoices); ?>
         <p>Difficulty Level</p>
         <?php dump($difficulty); ?>
         <p>Quiz ID</p>
         <?php dump($quizid); ?>


@endsection

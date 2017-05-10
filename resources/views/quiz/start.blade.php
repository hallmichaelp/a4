@extends('layouts.master')

@section('title')
  Create New Quiz
@endsection

@section('content')

  <!-- Page Instructions -->

  <aside>
    <h4>Create a quiz to test your knowledge of world capitals.</h4>
  </aside>

  <!-- Start of the Form -->

  <form method='POST' action='/quiz'>

    {{ csrf_field() }}

      <!-- First Form Question -->

      <div class="row">
        <div class="twelve columns">
          <label for="difficulty">*Difficulty:</label>
          <select id="difficulty" name="difficulty_level" required>
            <option value="easy">Easy</option>
            <option value="moderate">Moderate</option>
            <option value="hard">Hard</option>
          </select>
        </div>
      </div>

      <!-- Second Form Question -->

      <div class="row">
        <div class="twelve columns">
          <label for="questions">*Total Questions:</label>
          <input type="number" id="questions" name="num_of_questions" min="5" max="12" value="5" required>
          <p class="italic">Total number of quiz questions must be between 5 and 12.</p>
        </div>
      </div>

      <!-- Form Submission Button -->

      <div class="row">
        <div class="twelve columns">
          <input class="button-primary" type="submit" value="Create Quiz">
        </div>
      </div>

    </form>

    <!-- End of the Form -->

    <p class="italic">* Indicates a required field.</p>

@endsection

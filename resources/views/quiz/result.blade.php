@extends('layouts.master')

@section('title')
  Your Results
@endsection

@section('content')

<aside>
  <h3>Results</h3>
  <h5>You scored {{ $numanswerscorrect }} answers correct out of {{ $totalquestions }} total questions.</h5>
</aside>

<table class="u-full-width">
  <thead>
    <tr>
      <th>Country</th>
      <th>Capital</th>
      <th>Your Answer</th>
    </tr>
  </thead>

  <tbody>
    @foreach($countrydata as $question => $value)
      <tr>
        <td>{{ $value[0] }}</td>
        <td>{{ $value[1] }}</td>
        <td>{{ $useranswers[$question + 1] }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

<div class="row">
  <div class="twelve columns">
    <input class="button" type="submit" value="Try Again" onclick="window.location.href='/'">
  </div>
</div>

@endsection

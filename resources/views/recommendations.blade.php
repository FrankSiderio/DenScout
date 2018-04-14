@extends('templates.skeleton')

@section('content')

  <h2>Housing Recommendations</h2> 
  <div class="row">
    <div class="input-field col s10 recommendations-search">
          <input class="recommendations-search-field" id="question" type="text" placeholder="Where can upperclassman live?">
          <label for="question">Ask a question</label>
          <div class="recommendations-searchbutton">
            <a class="waves-effect waves-light btn recommendations-search-button red"> <i class="material-icons">question_answer</i></a>
          </div>
    </div>
  </div>

@endsection

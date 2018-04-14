@extends('templates.skeleton')

@section('content')

  <h3>
    Pick your top 3 Preferences

    <form method="POST"id="top-3">
      {{ csrf_field() }}
      <p>1.</p>
      <p>2.</p>
      <p>3.</p>
    </form>
  </h3>

@endsection

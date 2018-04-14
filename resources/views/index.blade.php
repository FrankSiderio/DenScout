@extends('templates.skeleton')

@section('content')
  <!-- Space for groups you're a part of. -->
  <div class="parent">
    <div class="no-groups">
      <h3>Doesn't look like you're part of any groups.</h3>
      <a href="/create-group" class="btn-large red"><i class="material-icons left">group_add</i>Create a Group</a>
    </div>
  </div>

@endsection

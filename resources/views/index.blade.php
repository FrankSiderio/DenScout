@extends('templates.skeleton')

@section('content')
  <!-- Space for groups you're a part of. -->
  <div class="parent">
    <div class="no-groups">
      <h3>Doesn't look like you're part of any groups.</h3>
      <a href="#" class="btn-large red"><i class="material-icons left">group_add</i>Create a Group</a>
      <a href="#" class="btn-large blue accent-2"><i class="material-icons left">add_circle</i>Join a Group</a>
    </div>
    <div class="group-card red-text text-darken-4">
      something
    </div>
  </div>

@endsection

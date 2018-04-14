@extends('templates.skeleton')

@section('content')

  <h1>Create a Group</h1>
  <form action="/group" method="POST">
    {{ csrf_field() }}

    <label for="yourName">Your Name</label>
    <input type="text" name="yourName"></input>

    <label for="grade">Grade</label>
    <select name="grade" class="browser-default">
      <option value="freshman" selected>Freshman</option>
      <option value="something">Something else</option>
    </select>

    <h3>Invite Members</h3>
    <div id="members">

    </div>
    <button id="add-invite-member" class="btn blue accent-1"><i class="material-icons left">add_circle</i>Add CWID to Invite</button>

    <br>
    <br>
    <input class="btn red"type="submit" value="Create Group">
  </form>

@endsection

@section('js')
  <script src="/js/group.js"></script>
@endsection

@extends('templates.skeleton')

@section('content')

  <h1>Join {{ App\Models\Group::getLeader($id) }}'s Group</h1>
  <form action="/join/{{ $id }}/{{ $cwid }}" method="POST">
    {{ csrf_field() }}

    <div class="row">
      <div class="input-group col m4">
        <label for="yourName">Your Name</label>
        <input type="text" name="name"></input>
      </div>



      <div class="input-group col m6 offset-m1">
        <label for="grade">Grade</label>
        <select name="grade" class="browser-default">
          @foreach(App\Models\Grade::orderBy('rank', 'ASC')->get() as $grade)
            <option value="{{ $grade->rank }}">{{ $grade->grade }}</option>
          @endforeach
        </select>

      </div>

    </div>

    <input class="btn red"type="submit" value="Join Group">
  </form>

@endsection

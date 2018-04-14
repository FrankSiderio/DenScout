@extends('templates.skeleton')

@section('content')

  <h1>Create a Group</h1>
  <form action="/group" method="POST">
    {{ csrf_field() }}

    <div class="row">
      <div class="input-group col m4">
        <label for="yourName">Your Name</label>
        <input type="text" name="name" required></input>
      </div>



      <div class="input-group col m6 offset-m1">
        <label for="grade">Grade</label>
        <select name="grade" class="browser-default" required>
          @foreach(App\Models\Grade::orderBy('rank', 'ASC')->get() as $grade)
            <option value="{{ $grade->rank }}">{{ $grade->grade }}</option>
          @endforeach
        </select>

      </div>

    </div>

    <h3>Invite Members</h3>
    <div class="row">
      <div id="members" class="col m3">

      </div>
    </div>

    <button id="add-invite-member" class="btn blue accent-1"><i class="material-icons left">add_circle</i>Add CWID to Invite</button>
    <button id="remove-invite-member" class="btn red accent-2"><i class="material-icons left">remove_circle</i>Remove</button>
    <br>
    <br>
    <input class="btn red"type="submit" value="Create Group">
  </form>

@endsection

@section('js')
  <script src="/js/group.js"></script>
  @if (session('message'))
    <script>
       M.toast({html: '{{ session("message") }}'})
    </script>
  @endif
  @if (session('error'))
    <script>
       M.toast({html: '{{ session("error") }}'})
    </script>
  @endif
@endsection

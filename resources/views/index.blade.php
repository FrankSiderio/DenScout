@extends('templates.skeleton')

@section('content')
  <!-- Space for groups you're a part of. -->
  <div class="parent">
    @if (session('error'))
      <div class="col m12">
        <div class="card-panel red">
          <span class="white-text">{{ session('error') }}</span>
        </div>
      </div>
    @endif
    @if(!(App\Models\Student::isInGroup(session('cwid'))))
      <div class="no-groups">
        <h3>Doesn't look like you're part of any groups.</h3>
        <a href="/create-group" class="btn-large red"><i class="material-icons left">group_add</i>Create a Group</a>
      </div>
    @else
      <div class="card-panel group-info">
        <h4>{{ App\Models\Student::getGroupLeader(session('cwid')) }}'s Group</h4>

        <h5>Members</h5>
        <table>
          <thead>
            <tr>
                <th>Name</th>
                <th>CWID</th>
                <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach(App\Models\Student::getGroupMembers(session('cwid')) as $member)
              <tr>
                <td>{{ App\Models\Student::getName($member->cwid) }}</td>
                <td>{{ $member->cwid }}</td>
                <td>{{ $member->status }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <h5>Preferences</h5>
        @if(!App\Models\Group::hasPreferences(session('cwid')))
          <span class="red-text no-preferences">Looks like you don't have your preferences configured.</span>
          <br>
          <br>
          @if(App\Models\Student::isLeader(session('cwid')))
            <a href="/preferences" class="btn red">Pick housing preferences</a>
          @endif
        @else
          @foreach(App\Models\Group::getPreferences(session('cwid')) as $preference)
            <p>Name: {{ $preference->residence->name }}</p>
            <p>Capacity: {{ $preference->residence->capacity }}</p>
            <p>Image: {{ $preference->residence->image_url }}</p>
          @endforeach
        @endif
      </div>
    @endif
  </div>

@endsection
@section('js')
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

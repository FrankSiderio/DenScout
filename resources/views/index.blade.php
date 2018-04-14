@extends('templates.skeleton')

@section('content')
  <!-- Space for groups you're a part of. -->
  <div class="parent">
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
        <span class="red-text no-preferences">Looks like you don't have your preferences configured.</span>
        <br>
        <br>
        <a href="/preferences" class="btn red">Pick housing preferences</a>
      </div>
    @endif
  </div>

@endsection

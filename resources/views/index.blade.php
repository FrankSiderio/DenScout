@extends('templates.skeleton')

@section('content')
  <!-- Space for groups you're a part of. -->
  <div class="parent">
    <div class="no-groups">
      <h3>Doesn't look like you're part of any groups.</h3>
      <a href="/create-group" class="btn-large red"><i class="material-icons left">group_add</i>Create a Group</a>
    </div>
    <div class="card-panel group-info">
      <h4>Tom's Group</h4>

      <h5>Members</h5>
      <table>
        <thead>
          <tr>
              <th>Name</th>
              <th>CWID</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Alvin</td>
            <td>20073139</td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>1231321</td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>20073139</td>
          </tr>
        </tbody>
      </table>
      <h5>Preferences</h5>
      <span class="red-text no-preferences">Looks like you don't have your preferences configured.</span>
      <br>
      <br>
      <a href="/preferences" class="btn red">Pick housing preferences</a>
    </div>
  </div>

@endsection

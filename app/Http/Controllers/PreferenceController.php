<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preference;
use App\Models\StudentGroup;
use App\Models\Group;
use App\Models\Student;

class PreferenceController extends Controller
{
  public function index() {
    if(!Student::isLeader(session('cwid'))) {
      app()->abort('404');
    }

    if(Group::hasPreferences(session('cwid'))) {
      app()->abort('404');
    }
    return view('pick_preferences');
  }

  public function create(Request $request) {
    // Get groupId from student
    $groupId = StudentGroup::where('cwid', session('cwid'))->where('status', 'leader')->value('group_id');

    // Create 3 preferences
    Preference::create([
      'residence_area_id' => $request['pref-1'],
      'group_id' => $groupId,
      'rank' => 0,
    ]);
    Preference::create([
      'residence_area_id' => $request['pref-2'],
      'group_id' => $groupId,
      'rank' => 1,
    ]);
    Preference::create([
      'residence_area_id' => $request['pref-3'],
      'group_id' => $groupId,
      'rank' => 2,
    ]);

    session()->flash('message', 'Your housing preferences have been added!');

    return redirect('/');
  }
}

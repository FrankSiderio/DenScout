<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentGroup;
use App\Jobs\RequestMemberJob;
use App\Models\Student;
use App\Models\Group;
use Carbon\Carbon;

class GroupController extends Controller
{
  /**
   * Returns all the groups with their students
   * @return collection
   */
  public function index() {
    $groups = Group::with('student')->get();

    return compact('groups');
  }

  /**
   * Returns given group with all students
   * @param  integer $id
   * @return collection
   */
  public function show($id) {
    $group = Group::with('student', 'preference')->findOrFail($id);

    return compact('group');
  }

  /**
   * Creates a group
   * @return
   */
  public function create(Request $request) {
    $group = Group::create();

    $name = explode(" ", $request->name);

    $student = Student::create([
      'cwid' => session('cwid'),
      'first_name' => $name[0],
      'last_name' => $name[1],
      'grad_year' => Carbon::now()->year + $request->grade,
    ]);

    StudentGroup::create([
      'cwid' => session('cwid'),
      'group_id' => $group->id,
      'status' => 'leader', // The person that creates the group will be the leader
    ]);

    // Invite all the requested students
    foreach($request->member as $member) {
      if($member != null) {

        Student::create([
          'cwid' => $member,
        ]);

        StudentGroup::create([
          'cwid' => $member,
          'group_id' => $group->id,
          'status' => 'pending',
        ]);

        $job = (new RequestMemberJob(session('cwid'), $member))
              ->delay(Carbon::now()->addSeconds(5));
        dispatch($job);
      }
    }


    session()->flash('message', 'Your group has been created!');

    return redirect('/');
  }

  /**
   * Officially adds a member to a group
   * @param integer $id
   * @param integer $cwid
   */
  public function addMember($id, $cwid) {
    $group = Group::findOrFail($id);
    $student = Student::findOrFail($cwid);

    StudentGroup::where('cwid', $cwid)
                ->where('group_id', $id)
                ->update(['status' => 'member']);

    return "success";
  }

  /**
   * When a member declines to join a group
   * @param  integer $id
   * @param  integer $cwid
   * @return
   */
  public function declineMember($id, $cwid) {
    $group = Group::findOrFail($id);
    $student = Student::findOrFail($cwid);

    StudentGroup::where('cwid', $cwid)
                ->where('group_id', $id)
                ->update(['status' => 'declined']);

    return "success";
  }
}

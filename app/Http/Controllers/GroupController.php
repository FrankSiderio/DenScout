<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentGroup;
use App\Jobs\RequestMemberJob;
use App\Models\Student;
use App\Models\Group;
use Carbon\Carbon;
use Validator;

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
  * Validator for creating groups
  * @param  array  $data
  * @return Validator
  */
  protected function validator(array $data) {
    return Validator::make($data, [
        'name' => 'required|string|max:100',
        'grade' => 'required'
    ]);
  }

  /**
   * Creates a group
   * @return redirect
   */
  public function create(Request $request) {
    $validator = $this->validator($request->all());

    if($validator->fails()) {
      session()->flash('error', $validator->errors()->first());

      return redirect('/create-group');
    }
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

    if(isset($request->member)) {
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

          $job = (new RequestMemberJob(session('cwid'), $member, $group->id))
                ->delay(Carbon::now()->addSeconds(5));
          dispatch($job);
        }
      }
    }

    session()->flash('message', 'Your group has been created!');

    return redirect('/');
  }

  public function join($id, $cwid) {
    Student::findOrFail($cwid);
    Group::findOrFail($id);

    return view('join_group', compact('id', 'cwid'));
  }

  /**
   * Officially adds a member to a group
   * @param integer $id
   * @param integer $cwid
   */
  public function addMember($id, $cwid, Request $request) {
    $group = Group::findOrFail($id);
    $student = Student::findOrFail($cwid);

    $name = explode(" ", $request->name);

    $student->first_name = $name[0];
    $student->last_name = $name[1] ?? '';
    $student->grad_year = $grade ?? null;
    $student->save();

    StudentGroup::where('cwid', $cwid)
                ->where('group_id', $id)
                ->update(['status' => 'member']);

    session()->flash('message', 'You have successfully joined!');

    return redirect('/');
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

    session()->flash('message', 'The group request has been declined.');

    return redirect('/');
  }
}

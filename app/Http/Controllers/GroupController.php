<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentGroup;
use App\Models\Student;
use App\Models\Group;

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
  public function create() {
    $group = Group::create();

    StudentGroup::create([
      'cwid' => session('cwid'),
      'group_id' => $group->id,
      'status' => 'leader', // The person that creates the group will be the leader
    ]);
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

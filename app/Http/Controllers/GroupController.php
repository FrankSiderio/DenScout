<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentGroup;
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
}

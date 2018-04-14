<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StudentGroup;

class Student extends Model
{
  public $primaryKey = "cwid";
  protected $fillable = ['cwid', 'first_name', 'last_name', 'grade'];

  public static function getFirstName($cwid) {
    $student = Student::findOrFail($cwid);

    return $student->first_name;
  }

  public static function getName($cwid) {
    $student = Student::findOrFail($cwid);

    return $student->first_name . " " . $student->last_name;
  }

  /**
   * Returns if the given student is in a group
   * @param  integer  $cwid
   * @return boolean
   */
  public static function isInGroup($cwid) {
    $student = StudentGroup::where('cwid', $cwid)->where('status', 'leader')->orWhere('status', 'member')->get();

    return $student->count() > 0;
  }

  /**
   * Returns the group leader for a students group
   * @param  integer $cwid
   * @return string
   */
  public static function getGroupLeader($cwid) {
    // Get the group the student is in
    $student = StudentGroup::where('cwid', $cwid)->where('status', 'leader')->orWhere('status', 'member')->get();

    // With the group id return the leader
    $groupLeader = StudentGroup::where('group_id', $student[0]->group_id)->value('cwid');

    // Return the group leader
    return Student::getFirstName($groupLeader);
  }

  /**
   * Returns all the group members in a students group
   * @param  integer $cwid
   * @return collection
   */
  public static function getGroupMembers($cwid) {
    // First we need to get the group id
    $groupId = StudentGroup::where('cwid', $cwid)->value('group_id');

    // Then with the group id get all the active members in the group
    return StudentGroup::with('student')->where('group_id', $groupId)->get();
  }
}

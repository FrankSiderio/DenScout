<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StudentGroup;
use App\Mail\RequestMember;
use App\Models\Preference;
use App\Models\Student;
use App\Models\Group;


class Group extends Model
{
    public function student() {
      return $this->hasMany(StudentGroup::class, 'group_id')
            ->where('status', '!=', 'pending')
            ->where('status', '!=', 'declined');
    }

    public function preference() {
      return $this->hasMany(Preference::class, 'group_id');
    }

    /**
     * Adds a member to the given group
     * @param integer $id
     * @param integer $cwid
     */
    public static function requestMember($leaderCwid, $cwid) {
      // Create the student first
      Student::create([
        'cwid' => $cwid,
      ]);

      // Get the group from the group leader
      $groupId = StudentGroup::where('cwid', $leaderCwid)->value('group_id');
      $group = Group::findOrFail($groupId);
      StudentGroup::create([
        'cwid' => $cwid,
        'group_id' => $group->id,
        'status' => 'pending',
      ]);

      \Mail::to($cwid . "@marist.edu")->queue(new RequestMember(Student::getName($leaderCwid)));
    }

    /**
     * Returns if a students group has preferences
     * @param  integer  $cwid
     * @return boolean
     */
    public static function hasPreferences($cwid) {
      // Get the group id that the student is apart of
      $groupId = StudentGroup::where('cwid', $cwid)->where('status', 'leader')->orWhere('status', 'member')->value('group_id');

      // See if that specifc group has any preferences
      $preferences = Preference::where('group_id', $groupId)->get();

      return $preferences->count() > 0;
    }

    /**
     * Returns the preferences a students group has
     * @param  integer $cwid
     * @return collection
     */
    public static function getPreferences($cwid) {
      // Get the group
      $groupId = StudentGroup::where('cwid', $cwid)->where('status', 'leader')->orWhere('status', 'member')->value('group_id');

      // Return the preferences
      return Preference::with('residence')->where('group_id', $groupId)->orderBy('rank', 'ASC')->get();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\StudentGroup;
use App\Models\Student;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $group = Group::create();

      $students = Student::all();

      foreach($students as $student) {
        StudentGroup::create([
          'cwid' => $student->cwid,
          'group_id' => $group->id
        ]);
      }
    }
}

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

      StudentGroup::create([
        'cwid' => 20056533,
        'group_id' => $group->id,
        'status' => 'leader',
      ]);

      StudentGroup::create([
        'cwid' => 20073139,
        'group_id' => $group->id,
        'status' => 'member',
      ]);
    }
}

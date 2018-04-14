<?php

use Illuminate\Database\Seeder;
use App\Models\ResidenceArea;
use App\Models\Preference;
use App\Models\Group;

class PreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $group = Group::find(1);
      $residence = ResidenceArea::where('name', 'Building A')->get()[0];

      Preference::create([
        'residence_area_id' => $residence->id,
        'rank' => 0,
        'group_id' => $group->id,
      ]);
    }
}

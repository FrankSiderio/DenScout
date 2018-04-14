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
      Preference::create([
        'residence_area_id' => 6,
        'rank' => 0,
        'group_id' => 1,
      ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\HousingAdmin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      HousingAdmin::create([
        'cwid' => 20056533,
      ]);
      HousingAdmin::create([
        'cwid' => 20073139,
      ]);
    }
}

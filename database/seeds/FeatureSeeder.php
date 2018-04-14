<?php

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $features = ['kitchen', 'kitchenette', 'singles', 'accessible'];

      foreach($features as $feature) {
        Feature::create([
          'name' => $feature
        ]);
      }
    }
}

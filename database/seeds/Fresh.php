<?php

use Illuminate\Database\Seeder;

class Fresh extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $this->call(FeatureSeeder::class);
    $this->call(GradeSeeder::class);
    $this->call(ResidenceSeeder::class);
  }
}

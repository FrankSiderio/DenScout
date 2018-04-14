<?php

use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $grades = ['freshman', 'sophomore', 'junior'];
      $ranks = [3, 2, 1];

      for($i = 0; $i < count($grades); $i++) {
        Grade::create([
          'grade' => $grades[$i],
          'rank' => $ranks[$i],
        ]);
      }
    }
}

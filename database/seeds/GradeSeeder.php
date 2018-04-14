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
      $grades = ['freshman', 'sophomore', 'junior', 'senior'];

      foreach($grades as $grade) {
        Grade::create([
          'grade' => $grade,
        ]);
      }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Student::create([
        'cwid' => 20056533,
        'first_name' => 'Frank',
        'last_name' => 'Siderio',
        'grad_year' => 2020,
      ]);

      Student::create([
        'cwid' => 20073139,
        'first_name' => 'Tommy',
        'last_name' => 'Mags',
        'grad_year' => 2020,
      ]);
    }
}

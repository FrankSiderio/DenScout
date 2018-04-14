<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StudentSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(ResidenceSeeder::class);
        $this->call(PreferenceSeeder::class);
    }
}

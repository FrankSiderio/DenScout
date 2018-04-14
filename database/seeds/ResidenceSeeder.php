<?php

use Illuminate\Database\Seeder;
use App\Models\ResidenceArea;
use App\Models\ResidenceGrade;

class ResidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Start under classmen
      $residence = ResidenceArea::create([
        'name' => 'Midrise Hall',
        'capacity' => 339,
      ]);

      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Freshman',
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Sophomore',
      ]);

      $residence = ResidenceArea::create([
        'name' => 'Foy Townhouses',
        'capacity' => 216,
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Sophomore',
      ]);

      $residence = ResidenceArea::create([
        'name' => 'New Townhouses',
        'capacity' => 136,
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Sophomore',
      ]);

      $residence = ResidenceArea::create([
        'name' => 'Lower West Cedar St Townhouses',
        'capacity' => 224,
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Sophomore',
      ]);
      $residence = ResidenceArea::create([
        'name' => 'Upper West Cedar St Townhouses',
        'capacity' => 224,
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Sophomore',
      ]);
      // End underclassmen

      // Start uperclassmen
      $residence = ResidenceArea::create([
        'name' => 'Building A',
        'capacity' => 291,
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Junior',
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Senior',
      ]);

      $residence = ResidenceArea::create([
        'name' => 'Building B',
        'capacity' => 172,
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Junior',
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Senior',
      ]);

      $residence = ResidenceArea::create([
        'name' => 'Building C',
        'capacity' => 167,
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Junior',
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Senior',
      ]);

      $residence = ResidenceArea::create([
        'name' => 'Building D',
        'capacity' => 156,
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Junior',
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Senior',
      ]);

      $residence = ResidenceArea::create([
        'name' => 'New Fulton Townhouses',
        'capacity' => 264,
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Junior',
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Senior',
      ]);

      $residence = ResidenceArea::create([
        'name' => 'Fulton Street Townhouses',
        'capacity' => 248,
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Junior',
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Senior',
      ]);

      $residence = ResidenceArea::create([
        'name' => 'Talmadge Court',
        'capacity' => 100,
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Junior',
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Senior',
      ]);
      // End uperclassmen

    }
}

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
        'image_url' => 'http://www.marist.edu/housing/images/MR%20Outside%20Mini.jpg',
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
        'image_url' => 'http://www.marist.edu/housing/images/Foy%20Outside%20Mini.jpg',
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Sophomore',
      ]);

      $residence = ResidenceArea::create([
        'name' => 'New Townhouses',
        'capacity' => 136,
        'image_url' => 'http://www.marist.edu/housing/images/TH%20Outside%20Mini.jpg',
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Sophomore',
      ]);

      $residence = ResidenceArea::create([
        'name' => 'Lower West Cedar St Townhouses',
        'capacity' => 224,
        'image_url' => 'http://www.marist.edu/housing/images/WC%20Outside%20Mini.jpg',
      ]);
      ResidenceGrade::create([
        'residence_area_id' => $residence->id,
        'grade' => 'Sophomore',
      ]);
      $residence = ResidenceArea::create([
        'name' => 'Upper West Cedar St Townhouses',
        'capacity' => 224,
        'image_url' => 'http://www.marist.edu/housing/images/WU%20Outside%20Mini.jpg',
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
        'image_url' => 'http://www.marist.edu/housing/images/bldga_courtyard%20Small.jpg',
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
        'image_url' => 'http://www.marist.edu/housing/images/Building%20B%20Outside%20Mini.jpg',
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
        'image_url' => 'http://www.marist.edu/housing/images/Northend.jpg',
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
        'image_url' => 'http://www.marist.edu/housing/images/Northend.jpg',
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
        'image_url' => 'http://www.marist.edu/housing/images/FL2%20Outside%20Mini.jpg',
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
        'image_url' => 'http://www.marist.edu/housing/images/FL%20Outside%20Mini.jpg',
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
        'image_url' => 'http://www.marist.edu/housing/images/talmadge_thumb.jpg',
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

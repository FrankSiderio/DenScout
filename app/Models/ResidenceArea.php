<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Grade;
use Carbon\Carbon;

class ResidenceArea extends Model
{
  public function preference() {
    return $this->hasMany(Preference::class, 'residence_area_id');
  }

  public static function options() {
    // Get the current students grade
    $gradYear = Student::find(session('cwid'))->value('grad_year');
    $grade = Grade::where('rank', $gradYear - Carbon::now()->year)->value('grade');

    // Return all the residence areas associated with that grade
    $residenceAreas = ResidenceGrade::where('grade', $grade)->pluck('residence_area_id');
    $options = ResidenceArea::whereIn('id', $residenceAreas)->get();

    return $options;
  }
}

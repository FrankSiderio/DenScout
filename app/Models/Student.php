<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  public $primaryKey = "cwid";

  public function group() {
    return $this->hasMany(StudentGroup::class, 'cwid');
  }

  public static function getName($cwid) {
    $student = Student::findOrFail($cwid);

    return $student->first_name . " " . $student->last_name;
  }
}

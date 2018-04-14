<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  public $primaryKey = "cwid";
  protected $fillable = ['cwid', 'first_name', 'last_name', 'grade'];

  public static function getName($cwid) {
    $student = Student::findOrFail($cwid);

    return $student->first_name . " " . $student->last_name;
  }
}

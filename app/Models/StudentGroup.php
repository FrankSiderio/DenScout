<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
  protected $fillable = ['cwid', 'group_id', 'status'];
}

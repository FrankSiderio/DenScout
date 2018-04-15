<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
  protected $fillable = ['residence_area_id', 'rank', 'group_id'];

  public function residence() {
    return $this->belongsTo(ResidenceArea::class, 'residence_area_id');
  }
}

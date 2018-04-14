<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
  public function residence() {
    return $this->belongsTo(ResidenceArea::class, 'residence_area_id');
  }
}

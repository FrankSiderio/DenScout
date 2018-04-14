<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidenceArea extends Model
{
  public function preference() {
    return $this->hasMany(Preference::class, 'residence_area_id');
  }
}

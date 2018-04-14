<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function student() {
      return $this->hasMany(StudentGroup::class, 'group_id')
            ->where('status', '!=', 'pending')
            ->where('status', '!=', 'declined');
    }

    public function preference() {
      return $this->hasMany(Preference::class, 'group_id');
    }
}

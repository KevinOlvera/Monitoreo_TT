<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Front extends Model
{
  #Scopes
  public function scopeSearch($query, $project)
  {
    return $query->where('id', 'LIKE', "%$project%");
  }
}

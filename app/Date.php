<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
  protected $table = "dates";

  protected $fillable = ['date', 'state', 'name'];

  #Relacion Citas - Usuarios
  #Nombre de la funcion en plural.
  public function users()
  {
    return $this->belongsToMany('App\User');
  }

  #Relacion Proyecto - Citas
  #Nombre de la funcion en singular.
  public function project()
  {
    return $this->belongsTo('App\Project');
  }
}

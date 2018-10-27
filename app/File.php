<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "files";

    protected $fillable = ['name', 'project_id'];

    #Relacion Proyecto - Archivos
    #Nombre de la funcion en singular.
    public function project()
    {
      return $this->belongsTo('App\Project');
    }
}

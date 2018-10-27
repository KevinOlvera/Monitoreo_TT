<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
#Paquete EloquentSluggable
use Cviebrock\EloquentSluggable\Sluggable;

class Project extends Model
{
    use Sluggable;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = "projects";

    protected $fillable = ['title', 'score', 'type'];

    #Relacion Proyecto - Archivos
    #Nombre de la funcion en plural.
    public function files()
    {
      return $this->hasMany('App\File');
    }

    #Relacion Proyecto - Citas
    #Nombre de la funcion en plural.
    public function dates()
    {
      return $this->hasMany('App\Date');
    }

    /*
    #Relacion Usuario - Proyectos
    #Nombre de la funcion en singular.
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    */

    #Relacion Usuarios - Proyectos
    #Nombre de la funcion en plural.
    public function users()
    {
      return $this->belongsToMany('App\User');
    }

    #Scopes
    public function scopeSearch($query, $project)
    {
      return $query->where('id', 'LIKE', "%$project%");
    }
}

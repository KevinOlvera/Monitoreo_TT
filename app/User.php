<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    #Relacion Usuario - Proyectos
    #Nombre de la funcion en plural.
    public function projects()
    {
      return $this->hasMany('App\Project');
    }
    */

    #Relacion Usuarios - Proyectos
    #Nombre de la funcion en plural.
    public function projects()
    {
      return $this->belongsToMany('App\Project');
    }

    #Relacion Citas - Usuarios
    #Nombre de la funcion en plural.
    public function dates()
    {
      return $this->belongsToMany('App\Date');
    }

    #Scopes
    public function scopeSearch($query, $user)
    {
      return $query->where('user', 'LIKE', "%$user%");
    }

    #Funcion que retorna que tipo de ususario es.
    public function admin()
    {
      return $this->type === 'admin';
    }

    public function director()
    {
      return $this->type === 'director';
    }

    public function synodal()
    {
      return $this->type === 'synodal';
    }

    public function student()
    {
      return $this->type === 'student';
    }
}

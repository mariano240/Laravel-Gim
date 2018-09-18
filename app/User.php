<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function direccion(){
        return $this->belongsTo('App\Direccion');
    }

    public function historialEntrenamientos(){
        return $this->hasMany('App\HistorialEntrenamiento');
    }

    public function membresia(){
        return $this->hasOne('App\Membresia');
    }

    public function entrenamientos(){
        return $this->belongsToMany('App\Entrenamiento');
    }
}

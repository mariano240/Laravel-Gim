<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrenamiento extends Model
{
    public function usuarios(){
        return $this->belongsToMany('App\Usuario');
    }

    public function rutinas(){
        return $this->belongsToMany('App\Rutina');
    }

    public function historialEntrenamientos(){
        return $this->hasMany('App\HistorialEntrenamiento');
    }
}

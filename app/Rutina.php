<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    public function entrenamientos(){
        return $this->belongsToMany('App\Entrenamiento');
    }

    public function ejercicios(){
        return $this->belongsToMany('App\Ejercicio');
    }

    public function historialRutinas(){
        return $this->hasMany('App\HistorialRutina');
    }
}

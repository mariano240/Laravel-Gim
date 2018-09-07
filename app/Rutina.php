<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    public function entrenamientos(){
        return $this->belongsToMany('app\Entrenamiento');
    }

    public function ejercicios(){
        return $this->belongsToMany('app\Ejercicio');
    }

    public function historialRutinas(){
        return $this->hasMany('app\HistorialRutina');
    }
}

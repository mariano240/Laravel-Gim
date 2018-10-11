<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function direccion(){
        return $this->belongsTo('App\Direccion');
    }

    public function historialEntrenamientos(){
        return $this->hasMany('App\HistorialEntrenamiento');
    }

    public function membresia(){
        return $this->hasMany('App\Membresia');
    }

    public function entrenamientos(){
        return $this->belongsToMany('App\Entrenamiento');
    }
}

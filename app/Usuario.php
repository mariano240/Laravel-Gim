<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function direccion(){
        return $this->belongsTo('app\Direccion');
    }

    public function historialEntrenamientos(){
        return $this->hasMany('app\HistorialEntrenamiento');
    }

    public function membresia(){
        return $this->hasOne('app\Membresia');
    }

    public function entrenamientos(){
        return $this->belongsToMany('app\Entrenamiento');
    }
}

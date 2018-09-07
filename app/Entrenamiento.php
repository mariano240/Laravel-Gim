<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrenamiento extends Model
{
    public function usuarios(){
        return $this->belongsToMany('app\Usuario');
    }

    public function rutinas(){
        return $this->belongsToMany('app\Rutina');
    }

    public function historialEntrenamientos(){
        return $this->hasMany('app\HistorialEntrenamiento');
    }
}

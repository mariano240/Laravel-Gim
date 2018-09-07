<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    public function rutinas(){
        return $this->belongsToMany('app\Rutina');
    }

    public function musculos(){
        return $this->belongsToMany('app\Musculo');
    }

    public function historialEjercicios(){
        return $this->hasMany('app\HistorialEjercicio');
    }
}

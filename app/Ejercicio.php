<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    public function rutinas(){
        return $this->belongsToMany('App\Rutina');
    }

    public function musculos(){
        return $this->belongsToMany('App\Musculo');
    }

    public function historialEjercicios(){
        return $this->hasMany('App\HistorialEjercicio');
    }
}

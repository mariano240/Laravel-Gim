<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialRutina extends Model
{
    public function historialEntrenamiento(){
        return $this->belongsTo('App\HistorialEntrenamiento');
    }

    public function rutina(){
        return $this->belongsTo('App\Rutina');
    }

    public function historialEjercicio(){
        return $this->hasMany('App\HistorialEjercicio');
    }
}

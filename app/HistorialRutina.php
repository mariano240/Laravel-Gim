<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialRutina extends Model
{
    public function historialEntrenamiento(){
        return $this->belongsTo('app\HistorialEntrenamiento');
    }

    public function rutina(){
        return $this->belongsTo('app\Rutina');
    }

    public function historialEjercicio(){
        return $this->hasMany('app\HistorialEjercicio');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialEntrenamiento extends Model
{
    public function usuario(){
        return $this->belongsTo('app\Usuario');
    }

    public function entrenamiento(){
        return $this->belongsTo('app\Entrenamiento');
    }

    public function historialRutinas(){
        return $this->hasMany('app\HistorialRutina');
    }
}

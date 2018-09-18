<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialEntrenamiento extends Model
{
    public function usuario(){
        return $this->belongsTo('App\User');
    }

    public function entrenamiento(){
        return $this->belongsTo('App\Entrenamiento');
    }

    public function historialRutinas(){
        return $this->hasMany('App\HistorialRutina');
    }
}

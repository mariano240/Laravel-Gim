<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialEjercicio extends Model
{
    public function historialRutina(){
        return $this->belongsTo('App\HistorialRutina');
    }

    public function ejercicio(){
        return $this->belongsTo('App\Ejercicio');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    public function direcciones(){
        return $this->hasMany('App\Direccion');
    }

    public function provincia(){
        return $this->belongsTo('App\Provincia');
    }

}

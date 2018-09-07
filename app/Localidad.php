<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    public function direcciones(){
        return $this->hasMany('app\Direccion');
    }

    public function provincia(){
        return $this->belongsTo('app\Provincia');
    }

}

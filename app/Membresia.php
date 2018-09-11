<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    public function usuario(){
        return $this->belongsTo('App\Usuario');
    }  

    public function promociones(){
        return $this->hasMany('App\Promocion');
    }

    public function pagos(){
        return $this->hasMany('App\Pago');
    }
}

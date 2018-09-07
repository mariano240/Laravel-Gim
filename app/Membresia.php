<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    public function usuario(){
        return $this->belongsTo('app\Usuario');
    }  

    public function promociones(){
        return $this->belongsToMany('app\Promocion');
    }

    public function pagos(){
        return $this->hasMany('app\Pago');
    }
}

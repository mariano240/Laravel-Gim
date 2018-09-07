<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    public function usuarios(){
        return $this->hasMany('app\Usuario');
    }

    public function localidad(){
        return $this->belongsTo('app\Localidad');
    }
}

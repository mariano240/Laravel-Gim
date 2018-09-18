<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    public function usuarios(){
        return $this->hasMany('App\User');
    }

    public function localidad(){
        return $this->belongsTo('App\Localidad');
    }
}

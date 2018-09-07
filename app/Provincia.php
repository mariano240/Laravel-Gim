<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    public function localidades(){
        return $this->hasMany('App\Localidad');
    }

    public function pais(){
        return $this->belongsTo('App\Pais');
    }
}

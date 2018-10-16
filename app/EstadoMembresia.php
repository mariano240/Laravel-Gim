<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoMembresia extends Model
{
    
    public function membresia(){
        return $this->hasMany('App\Membresia');
    }  
}

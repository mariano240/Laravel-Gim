<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{

    public function membresia(){
        return $this->belongsTo('App\Membresia');
    }
}

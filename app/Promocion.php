<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{

    public function membresias(){
        return $this->belongsTo('App\Membresia');
    }
}

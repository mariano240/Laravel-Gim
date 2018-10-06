<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMembresia extends Model
{
    public function tipoPromocion(){
        return $this->belongsToMany('App\TipoPromocion', 'tipomembresia_tipopromocion');
    }
}

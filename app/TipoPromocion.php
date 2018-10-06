<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPromocion extends Model
{
    public function tipoMembresia(){
        return $this->belongsToMany('App\TipoMembresia', 'tipomembresia_tipopromocion');
    }
}

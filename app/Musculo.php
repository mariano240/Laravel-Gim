<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musculo extends Model
{
    public function regionCorporal(){
        return $this->belongsTo('app\RegionCorporal');
    }
}

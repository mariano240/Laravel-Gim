<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionCorporal extends Model
{
    public function musculos(){
        return $this->hasMany('app\Musculo');
    }
}

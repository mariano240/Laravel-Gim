<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class membresiaPromocionController extends Controller
{
    
    public function precargarModal(){
        return view("secciones.gestionarMembresiaPromocion");
    }
}

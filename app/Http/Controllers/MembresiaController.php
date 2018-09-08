<?php

namespace App\Http\Controllers;

use App\Membresia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembresiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*         $promocion=Membresia::where('id',1)->get();
        
        echo json_encode($promocion[0]->promociones); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Membresia  $membresia
     * @return \Illuminate\Http\Response
     */
    public function show(Membresia $membresium)
    {
        /* Usando foreach para acceder a cada promocion que posee una membresia */
        echo $membresium;
        $promociones=$membresium->promociones;
        foreach ($promociones as $promocion) {
            echo "<br>";
            echo $promocion;
        }
       
        // /* Ingresando directamente a la promocion numero x e imprimiendo con formato json */
        // echo json_encode($membresium->promociones[0]);
        
        // /* Ingresando directamente a la promocion numero x y retornando */
        // return $membresium->promociones[0];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Membresia  $membresia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membresia $membresia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Membresia  $membresia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membresia $membresia)
    {
        //
    }
}

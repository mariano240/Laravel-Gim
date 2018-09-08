<?php

namespace App\Http\Controllers;

use App\Promocion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*         $promocion=Promocion::where('id',1)->get();
        echo json_encode($promocion[0]);
        echo "<br>";
        echo json_encode($promocion[0]->membresias); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/*         $promocion= new Promocion();
        $promocion->descripccion=$request->input('descripcion');
        $promocion->fecha_inicio=$request->input('fecha_inicio');
        $promocion->fecha_fin=$request->input('fecha_fin');
        $promocion->descuento=$request->input('descuento');
        $promocion->tiempo_extendido=$request->input('tiempo_extendido');
        $promocion->save(); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function show(Promocion $promocion)
    {
        
        /* Usando foreach para acceder a cada membresia que posee a la promocion */
        
        echo $promocion;
        $membresias=$promocion->membresias;
        foreach ($membresias as $membresia) {
            echo "<br>";
            echo $membresia;
        }
       
        // echo "<br>";
        // echo "<br>";
        // /* Ingresando directamente a la membresia numero x e imprimiendo con formato json */
        // echo json_encode($promocion->membresias[0]);
       
        // echo "<br>";
        // echo "<br>";
        
        // /* Ingresando directamente a la membresia numero x y retornando */
        // return $promocion->membresias[0];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocion $promocion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promocion $promocion)
    {
        //
    }
}

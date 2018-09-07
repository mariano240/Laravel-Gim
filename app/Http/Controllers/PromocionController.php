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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promocion= new Promocion();
        $promocion->descripccion=$request->input('descripcion');
        $promocion->fecha_inicio=$request->input('fecha_inicio');
        $promocion->fecha_fin=$request->input('fecha_fin');
        $promocion->descuento=$request->input('descuento');
        $promocion->tiempo_extendido=$request->input('tiempo_extendido');
        $promocion->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promocion  $promocion
     * @return \Illuminate\Http\Response
     */
    public function show(Promocion $promocion)
    {
        //
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

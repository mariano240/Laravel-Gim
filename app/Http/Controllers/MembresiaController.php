<?php

namespace App\Http\Controllers;

use App\Membresia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TipoMembresia;
use App\TipoPromocion;
use App\Promocion;
use App\Pago;

//este controlador gestiona tanto la membresia como la promocion

class MembresiaController extends Controller
{
    
    private static $instance;

    public static function getInstancia() {
        if (!isset(self::$instance)) {
          self::$instance = new MembresiaController();
        }
        return self::$instance;
      }
    

    public function crearMembresia($idTipoMembresia,$usuario,$idTipoPromocion,$cantidadMeses,$formaPago){
       
       
        //creo membresia a partir del tipo de membresia, no se esta considerando el tiempo extendido aun
        $tipoMembresia=TipoMembresia::find($idTipoMembresia);
        $nuevaMembresia= new Membresia();
        $nuevaMembresia->estado='activa';
        $nuevaMembresia->costo=$tipoMembresia->costo;
        $nuevaMembresia->nombre=$tipoMembresia->nombre;
        $nuevaMembresia->descripcion=$tipoMembresia->descripcion;
        $fechaActual=date('y-m-j');
        $fechaOperada= strtotime( $fechaActual. '+'.$cantidadMeses.' month');
        $nuevaMembresia->fecha_vencimiento=date('y/m/d', $fechaOperada );
        $nuevaMembresia->usuario()->associate($usuario);
        $nuevaMembresia->save();
        
        //creo promocion a partir del tipo de promocion
       $tipoPromocion=TipoPromocion::find($idTipoPromocion);
       $nuevaPromocion=new Promocion();
       $nuevaPromocion->nombre=$tipoPromocion->nombre;
       $nuevaPromocion->descuento=$tipoPromocion->descuento;
       $nuevaPromocion->tiempo_extendido=$tipoPromocion->tiempo_extendido;
       $nuevaPromocion->descripcion=$tipoPromocion->descripcion;
       $nuevaPromocion->fecha_adquisicion=date('y/m/d');
       $nuevaPromocion->membresia()->associate($nuevaMembresia);
       $nuevaPromocion->save();

        //creo la forma de pago
        // 
        $costo=$tipoMembresia->costo;
        $descuento=$nuevaPromocion->descuento;
        $pago =new Pago();
        $pago->monto= ($costo-(($descuento/100)*$costo))*$cantidadMeses;
        $pago->forma_pago=$formaPago;
        $pago->fecha=date('y/m/d');
        $pago->membresia()->associate($nuevaMembresia);
        $pago->save();

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

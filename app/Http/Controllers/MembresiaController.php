<?php

namespace App\Http\Controllers;

use App\Membresia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TipoMembresia;
use App\TipoPromocion;
use App\Promocion;
use App\Pago;
use App\EstadoMembresia;
use App\User;
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
       
        $membresiaActiva=EstadoMembresia::find(1);
        //creo membresia a partir del tipo de membresia, no se esta considerando el tiempo extendido aun
        $tipoMembresia=TipoMembresia::find($idTipoMembresia);
        $nuevaMembresia= new Membresia();
        $nuevaMembresia->estado_membresia()->associate($membresiaActiva);
        $nuevaMembresia->costo=$tipoMembresia->costo;
        $nuevaMembresia->nombre=$tipoMembresia->nombre;
        $nuevaMembresia->descripcion=$tipoMembresia->descripcion;
        $fechaActual=date('y-m-j');
        $fechaOperada= strtotime( $fechaActual. '+'.$cantidadMeses.' month');
        $nuevaMembresia->fecha_vencimiento=date('y/m/d', $fechaOperada );
        $nuevaMembresia->user()->associate($usuario);
        $nuevaMembresia->save();
        
        //es posible que no seleccione ninguna promocion
       if($idTipoPromocion!='0'){
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


       }else{
        //creo la forma de pago sin descuentos porque no tiene promociones
        // 
        $costo=$tipoMembresia->costo;
        
        $pago =new Pago();
        $pago->monto= $costo*$cantidadMeses;
        $pago->forma_pago=$formaPago;
        $pago->fecha=date('y/m/d');
        $pago->membresia()->associate($nuevaMembresia);
        $pago->save();
       }
        

        

    }

    public function actualizarMembresia(request $data){
        $usuario=User::find($data['idCliente']);
        $membresiaActual=Membresia::find($data['idMembresiaActual']);
        $membresiaArchivada=EstadoMembresia::find(4);
        $idTipoMembresia=$data['idMembresiaNueva'];
        $cantidadMeses=$data['cantidadMeses'];
        $idTipoPromocion=$data['idPromocionNueva'];
        $formaPago=$data['formaPago'];

        //archivo membresia actual
        $membresiaActual->estado_membresia()->associate($membresiaArchivada);
        $membresiaActual->save();

        //comienzo con la creacion de nueva membresia
        $membresiaActiva=EstadoMembresia::find(1);
        //creo membresia a partir del tipo de membresia, no se esta considerando el tiempo extendido aun
        $tipoMembresia=TipoMembresia::find($idTipoMembresia);
        $nuevaMembresia= new Membresia();
        $nuevaMembresia->estado_membresia()->associate($membresiaActiva);
        $nuevaMembresia->costo=$tipoMembresia->costo;
        $nuevaMembresia->nombre=$tipoMembresia->nombre;
        $nuevaMembresia->descripcion=$tipoMembresia->descripcion;
        $fechaActual=date('y-m-j');
        $fechaOperada= strtotime( $fechaActual. '+'.$cantidadMeses.' month');
        $nuevaMembresia->fecha_vencimiento=date('y/m/d', $fechaOperada );
        $nuevaMembresia->user()->associate($usuario);
        $nuevaMembresia->save();

          //es posible que no seleccione ninguna promocion
       if($idTipoPromocion!='0'){
        
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
       }else{
        $costo=$tipoMembresia->costo;
        
        $pago =new Pago();
        $pago->monto= $costo*$cantidadMeses;
        $pago->forma_pago=$formaPago;
        $pago->fecha=date('y/m/d');
        $pago->membresia()->associate($nuevaMembresia);
        $pago->save();

       }

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

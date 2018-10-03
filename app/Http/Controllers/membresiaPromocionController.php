<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Requests\tipoPromocionRequest;
use \App\Http\Requests\tipoMembresiaRequest;
use \App\TipoMembresia;
use \App\TipoPromocion;

class membresiaPromocionController extends Controller
{
    
    public function precargarModal(){
        $membresias=TipoMembresia::all();
        $promociones=TipoPromocion::all();
        return view("secciones.gestionarMembresiaPromocion",compact('membresias','promociones'));
    }

    public function crearTipoPromocion(tipoMembresiaRequest $promocion){
        $tipoPromocion=new TipoPromocion;
        $tipoPromocion->nombre= $promocion['nombre'];
        $tipoPromocion->estado= 'activo';
        $tipoPromocion->descripcion= $promocion['descripcion'];
        
        $tipoPromocion->fecha_inicio=date("y/m/d",strtotime($promocion['fecha_inicial']));
        $tipoPromocion->fecha_fin=date("y/m/d",strtotime($promocion['fecha_fin']));
        $tipoPromocion->tiempo_extendido= $promocion['tiempo_extendido'];
        $tipoPromocion->cant_meses= $promocion['cant_meses'];
        $tipoPromocion->descuento= $promocion['descuento'];
        $tipoPromocion->save();

        return ['respuesta'=> 'correcto'];
    }

    public function crearTipoMembresia(tipoMembresiaRequest $membresia){
        $tipoMembresia=new TipoMembresia;
        $tipoMembresia->nombre= $membresia['nombre'];
        $tipoMembresia->estado= 'activo';
        $tipoMembresia->descripcion= $membresia['descripcion'];
        $tipoMembresia->costo= $membresia['costo'];
        $tipoMembresia->save();
        return ['respuesta'=> 'correcto'];
    }

    public function editarTipoMembresia(tipoMembresiaRequest $membresia){
        $tipoMembresia= TipoMembresia::find($membresia['idTipoMembresia']);
        $tipoMembresia->nombre= $membresia['nombre'];
        $tipoMembresia->estado= 'activo';
        $tipoMembresia->descripcion= $membresia['descripcion'];
        $tipoMembresia->costo= $membresia['costo'];
        $tipoMembresia->save();
        return ['respuesta'=> 'correcto'];
    }

    public function editarTipoPromocion(tipoPromocionRequest $promocion){
        $tipoPromocion= TipoPromocion::find($promocion['idTipoPromocion']);
        $tipoPromocion->nombre= $promocion['nombre'];
        $tipoPromocion->estado= 'activo';
        $tipoPromocion->descripcion= $promocion['descripcion'];
        
        $tipoPromocion->fecha_inicio=date("y/m/d",strtotime($promocion['fecha_inicial']));
        $tipoPromocion->fecha_fin=date("y/m/d",strtotime($promocion['fecha_fin']));
        $tipoPromocion->tiempo_extendido= $promocion['tiempo_extendido'];
        $tipoPromocion->cant_meses= $promocion['cant_meses'];
        $tipoPromocion->descuento= $promocion['descuento'];
        $tipoPromocion->save();

        return ['respuesta'=> 'correcto'];
    }

    public function eliminarTipoMembresia(Request $id){
        TipoMembresia::destroy($id['idTipoMembresia']);
        return ["resultado"=>"exito"];
        //BD::table('tipo_membresia')->where('id',$id);
    }

    public function eliminarTipoPromocion(Request $id){
        TipoPromocion::destroy($id['idTipoPromocion']);
        return ["resultado"=>"exito"];
    }
    public function buscarTipoPromocionId(Request $id){
        return TipoPromocion::find($id['idTipoPromocion']);
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Pais;
use App\Provincia;
use App\Localidad;
use App\Direccion;
//estos deberian estar en sus controladores
use App\Membresia;
use App\Promocion;
use App\Pago;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use \App\Http\Requests\altaUsuarioRequest;

class UsuarioController extends Controller
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

    public function tablaClientes(){
        return datatables()->of(
            //se reestructurara cuando se tenga servicio que cambie los estados, a diario, entonces aca solo se evaluaria el tipo de estado
            User::whereHas('membresia',function($query){
                $query->where([
                    ['estado_membresia_id','like','1']
                ]);
                
            })
            ->with(['membresia','membresia.pagos','membresia.promociones'])->get()

            
            )
            ->toJson();
    }

    public function clienteMembresia(){

        return view('secciones.clienteMembresia');
    }

    public function precargarModal()
    {
        $paises=Pais::all();
        //se setea por defecto argentina y sus provincias
        $provincias=Provincia::where('pais_id',1)->get();
        $localidades=Localidad::where('provincia_id',22)->get();
        //precargar tipo de membresia junto con las promociones, esto deberia estar en su controlador
        $membresiaspromocion=membresiaPromocionController::getMembersiasPromocion();
        $tipoMembresia=$membresiaspromocion[0];
        $tipoPromocion=$membresiaspromocion[1];
        return view('secciones.altaUsuario',compact('paises', 'provincias', 'localidades','tipoMembresia','tipoPromocion'));
       
    }

    public function cargaProvincias($id_pais)
    {
        $provincias=Provincia::where('pais_id',$id_pais)->get();
        return $provincias;
    }

    public function cargaLocalidades($id_provincia)
    {
        $localidades=Localidad::where('provincia_id',$id_provincia)->get();
        return $localidades;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(altaUsuarioRequest $request)
    {       
        
        $localidad= Localidad::find($request['idLocalidad']);
        //falta contemplar los campos vacios
        $direccion=new Direccion;
        //se deberia asociar con localidad
        //$direccion->localidad_id=$request['idLocalidad'];
        $direccion->calle=$request['calle'];
        $direccion->altura=$request['altura'];
        $direccion->piso=$request['piso'];
        $direccion->departamento=$request['departamento'];
        $direccion->localidad()->associate($localidad);
        $direccion->save();
        

        $usuario=new User;
        $usuario->nombre = $request['nombre'];
        $usuario->apellido = $request['apellido'];
        $usuario->dni = $request->input('dni');
        $usuario->email = $request['email'];
        $usuario->password = Hash::make($request['dni']);
        //en posteriores entregas se trabajara los roles, por el momento son clintes
        $usuario->tipo_usuario = 'cliente';
        $usuario->nombre_usuario = $request['dni'];
        $usuario->telefono = $request['telefono'];
        $usuario->estado = 'activo';
        //deberia ser una asociacion con direccion
        //$usuario->direccion_id = $direccion->id;
        $usuario->direccion()->associate($direccion);
        $usuario->fecha_alta = date('y/m/d');
        $usuario->created_at = date('y/m/d h:i:s');
        $usuario->save();
        
        
        //trabajar con los demas controladores para primero crear la membresia , por ahora se crea todo aca
        MembresiaController::getInstancia()->crearMembresia($request['idMembresia'],$usuario,$request['idPromocion'],$request['cantidadMeses'],$request['formaPago']);

        //crear promocion y forma de pago, para luego asociarlos


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}

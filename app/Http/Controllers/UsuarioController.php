<?php

namespace App\Http\Controllers;

use App\User;
use App\Pais;
use App\Provincia;
use App\Localidad;
use App\Direccion;
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

    public function precargarModal()
    {
        $paises=Pais::all();
        //se setea por defecto argentina y sus provincias
        $provincias=Provincia::where('pais_id',1)->get();
        $localidades=Localidad::where('provincia_id',22)->get();

        return view('secciones.altaUsuario',compact('paises', 'provincias', 'localidades'));
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
        //falta contemplar los campos vacios
        $direccion=new Direccion;
        $direccion->localidad_id=$request['select-localidad'];
        $direccion->calle=$request['calle'];
        $direccion->altura=$request['altura'];
        $direccion->save();
        
        
        $usuario=new User;
        $usuario->nombre = $request['nombre'];
        $usuario->apellido = $request['apellido'];
        $usuario->dni = $request->input('dni');
        $usuario->email = $request['email'];
        $usuario->password = Hash::make($request['dni']);
        $usuario->tipo_usuario = 'cliente';
        $usuario->nombre_usuario = $request['dni'];
        $usuario->telefono = $request['telefono'];
        $usuario->estado = 'activo';
        $usuario->direccion_id = $direccion->id;
        $usuario->fecha_alta = date('y/m/d');
        $usuario->created_at = date('y/m/d h:i:s');
        $usuario->save();

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

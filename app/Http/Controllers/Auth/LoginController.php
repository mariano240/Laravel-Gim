<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \App\Http\Requests\loginrequest;
use \Auth;
class LoginController extends Controller
{
public function login(){

    //loginrequest $request
    $credenciales=$this->validate(request(),[
        'nombre_usuario'=> 'required|string',
        'password'=> 'required|string'
    ]);

    if(Auth::attempt($credenciales)){
       return redirect()->route('barraInicial'); 
    }
    return back()
            ->withErrors(['nombre_usuario'=>'el nombre de usuario y/o contraseña no son correctos'])
            ->withInput(request(['nombre_usuario']));
}

}


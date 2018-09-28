<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('panelInicial.barrainicio');
});

Route::get('/login', function () {
    //return view('welcome');
    return view('panelInicial.login');
});

//deberia gestionar las barras de inicio dependiendo del usuario logeado
Route::get('/barrainicio', 'barraInicioController@index')->name('barraInicial');



//login 
Route::post('login', 'Auth\LoginController@Login')->name('login');


Route::get('/altaCliente','UsuarioController@precargarModal');

Route::get('/gestionarMembresiaPromocion','membresiaPromocionController@precargarModal');

Route::post('/registrar', 'UsuarioController@store')->name('resgistrar');

Route::get('/home', 'HomeController@index');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//gestiones de tipo de membresia y promocion
Route::post('/crearTipoMembresia', 'membresiaPromocionController@crearTipoMembresia')->name('crearTipoMembresia');
Route::post('/crearTipoPromocion', 'membresiaPromocionController@crearTipoPromocion')->name('crearTipoPromocion');
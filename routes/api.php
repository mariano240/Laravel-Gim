<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('provincias/{id}','UsuarioController@cargaProvincias');
Route::get('localidades/{id}','UsuarioController@cargaLocalidades');

Route::apiResource('direccion','DireccionController');
Route::apiResource('ejercicio','EjercicioController');
Route::apiResource('entrenamiento','EntrenamientoController');
Route::apiResource('historialEjercicio','HistorialEjercicioController');
Route::apiResource('historialEntrenamiento','HistorialEntrenamientoController');
Route::apiResource('historialRutina','HistorialRutinaController');
Route::apiResource('localidad','LocalidadController');
Route::apiResource('membresia','MembresiaController');
Route::apiResource('musculo','MusculoController');
Route::apiResource('pago','PagoController');
Route::apiResource('pais','PaisController');
Route::apiResource('promocion','PromocionController');
Route::apiResource('provincia','ProvinciaController');
Route::apiResource('regionCorporal','RegionCorporalController');
Route::apiResource('rutina','RutinaController');
Route::apiResource('usuario','UsuarioController');


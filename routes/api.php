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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//obtienes todos los paraderos disponibles
Route::get('paraderos', 'ParaderoController@index');
//se obtiene las pasantias disponibles según el código de alumno {codigo}
Route::get('pasantias/{codigo}', 'ParaderoController@pasantiaAvailable');
//para hacer el streaming de las ubicaciones desde el android
Route::post('alumnoposicion','ParaderoController@streamingAlumnoUbicacion');
//obtener datos del alumno segun su codigo {codigo}
Route::get('alumno/{codigo}','AlumnoController@show');

//TODO
//CRUD DE PASANTIA
//CRUD DE BUSES
Route::get('bus','BusController@index');
Route::post('bus/store','BusController@store');
Route::get('bus/destroy/{id}','BusController@destroy');
Route::get('bus/show/{id}','BusController@show');
Route::post('bus/update','BusController@update');
//CRUD DE PARADEROS (CRUD DE RUTAS EN SPRING)
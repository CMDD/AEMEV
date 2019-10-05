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

// Rutas Oracionales
Route::post('crear-oracional','OracionalController@store');
Route::get('lista-oracionales','OracionalController@lista');
Route::get('get-oracional/{id}','OracionalController@detail');

// Rutas Adultos
Route::post('adulto-crear-dia','Adulto\DiaController@store');
//Rutas Puerta
Route::post('crear-dia-puerta','Puerta\PuertaController@store');
Route::get('get-dias/{id}','Puerta\PuertaController@getDias');
Route::get('get-dia/{id}','Puerta\PuertaController@getDia');

Route::get('oracionales','OracionalController@oracionales');
Route::get('dias/{id}','DiaController@dias');

Route::get('dias-demo/{id}','DiaController@diasDemo');
Route::get('detalle-dia/{id_oracional}/{dia}','DiaController@detalleDia');

Route::post('suscribirme','UserController@suscribirme');



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
Route::post('actualizar-dia-puerta','Puerta\PuertaController@update');
Route::get('get-dias-Puerta/{id}','Puerta\PuertaController@getDias');
Route::get('get-dia/{id}','Puerta\PuertaController@getDia');
//Adultos
Route::post('crear-dia-adultos','Adulto\DiaController@store');
Route::get('get-dias-Adultos/{id}','Adulto\DiaController@getDias');
Route::get('get-dia-adultos/{id}/{oracional}','Adulto\DiaController@getDia');
//Jovenes
Route::get('get-dias-Jovenes/{id}','Jovenes\DiaController@getDias');
Route::post('crear-dia-jovenes','Jovenes\DiaController@store'); 
Route::get('get-dia-jovenes/{id}/{oracional}','Jovenes\DiaController@getDia');

// Kids
Route::get('get-dias-Kids/{id}','Kids\DiaController@getDias');
Route::post('crear-dia-kids','Kids\DiaController@store'); 
Route::get('get-dia-kids/{dia}/{oracional}','Kids\DiaController@getDia');

Route::get('oracionales','OracionalController@oracionales');
Route::get('dias/{id}','DiaController@dias');

Route::get('dias-demo/{dato}','DiaController@diasDemo');
Route::get('detalle-dia/{id_oracional}/{dia}','DiaController@detalleDia');

Route::post('suscribirme','UserController@suscribirme');


// Rutas Apps Movil
Route::get('dias-demo-kids/{id}','DiaController@diasKids');
Route::get('dias-demo-jovenes/{id}','DiaController@diasJovenes');
Route::get('dias-demo-adultos/{id}','DiaController@diasAdultos');
Route::get('dias-demo-puerta/{id}','DiaController@diasPuerta');
    //Suscritos

Route::get('dias-kids/{id}','DiaController@diasKidsAll');
Route::get('dias-jovenes/{id}','DiaController@diasJovenesAll');
Route::get('dias-adultos/{id}','DiaController@diasAdultosAll');
Route::get('dias-puerta/{id}','DiaController@diasPuertaAll');
Route::get('editorial/{id}','OracionalController@editorial');



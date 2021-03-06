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
Route::get('salmos','OracionalController@salmos');
Route::post('crear-oracional','OracionalController@store');
Route::get('lista-oracionales','OracionalController@lista');
Route::get('get-oracional/{id}','OracionalController@detail');

// Rutas Adultos
Route::post('adulto-crear-dia','Adulto\DiaController@store');
//Jovenes
Route::get('get-dias-Jovenes/{id}','Jovenes\DiaController@getDias');
Route::post('crear-dia-jovenes','Jovenes\DiaController@store'); 
Route::get('get-admin-dia-jovenes/{dia}','Jovenes\DiaController@getDiaAdmin');
Route::post('update-dia-jovenes','Jovenes\DiaController@update');
//Rutas Puerta
Route::post('crear-dia-puerta','Puerta\PuertaController@store');
Route::post('actualizar-dia-puerta','Puerta\PuertaController@update');
Route::get('get-dias-Puerta/{id}','Puerta\PuertaController@getDias');
Route::get('get-admin-dia-puerta/{id}','Puerta\PuertaController@getDiaAdmin');

//Adultos
Route::post('crear-dia-adultos','Adulto\DiaController@store');
Route::get('get-dias-Adultos/{id}','Adulto\DiaController@getDias');
Route::get('get-admin-dia-adultos/{id}','Adulto\DiaController@getDiaAdmin');

Route::post('update-dia-adultos','Adulto\DiaController@update');


// Kids
Route::get('get-dias-Kids/{id}','Kids\DiaController@getDias');
Route::post('crear-dia-kids','Kids\DiaController@store'); 
Route::get('get-dia-kids/{dia}/{oracional}','Kids\DiaController@getDia');
Route::get('get-admin-dia-kids/{id}','Kids\DiaController@getDiaAdmin');
Route::post('update-dia-kids','Kids\DiaController@update');

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
//Jovenes
Route::get('get-dia-jovenes/{dia}/{oracional}','Jovenes\DiaController@getDia');
// Adultos
Route::get('get-dia-adultos/{id}/{oracional}','Adulto\DiaController@getDia');
// Puerta
Route::get('get-dia/{id}/{oracional}','Puerta\PuertaController@getDia');



//Suscritos
Route::get('dias-kids/{id}','DiaController@diasKidsAll');
Route::get('dias-jovenes/{id}','DiaController@diasJovenesAll');
Route::get('dias-adultos/{id}','DiaController@diasAdultosAll');
Route::get('dias-puerta/{id}','DiaController@diasPuertaAll');
Route::get('editorial/{id}','OracionalController@editorial');
Route::get('suscripciones/{id}','SuscripcionController@getSuscripciones');
Route::get('suscripcion-oracionales/{nombre}','SuscripcionController@getOracionales');
Route::post('suscripcion','SuscripcionController@store');

// Login
Route::post('auth/register','UserController@registro');
Route::post('auth/login','UserController@login');


//Administración
Route::get('usuarios','UserController@users');
Route::get('usuario/{id}','UserController@detail');
Route::post('usuario','UserController@store');
Route::post('update-user','UserController@updateUser');
Route::get('admin-suscripciones','SuscripcionController@suscripciones');
Route::get('admin-suscripciones/{id}','SuscripcionController@adminSuscripciones');
Route::post('admin-store-suscription','SuscripcionController@adminStoreSuscription');
Route::get('update-state-suscription/{id}','SuscripcionController@updateStateSuscription');
//Soporte 
Route::post('soporte',"SoporteController@store");
Route::post('update-soporte',"SoporteController@update");
Route::get('get-soporte/{tipo}',"SoporteController@index");
Route::get('soporte-show/{id}',"SoporteController@show");




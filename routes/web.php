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
use App\Oracional;
use App\Models\Puerta\DiaPuerta;
Route::get('/', function () {
    return view('oracional.index');
});
Route::get('/test', function () {
    $dia = new DiaPuerta();
    return $dia->getInfo();
   
});
// Oracionale
Route::get('crear-oracional',function(){return view('oracional.crear_oracional');});
Route::get('detalle-oracional/{id}','OracionalController@detalleOracional');
Route::post('actualizar-oracional/{id}','OracionalController@actualizarOracional');
Route::get('oracionales',function(){
    $oracionales = Oracional::all();
    return view('oracional.oracionales')->with('oracionales',$oracionales);
});
Route::post('crear-oracional','OracionalController@store');



//Dias
Route::post('crear-dia','OracionalController@crearDia');
Route::get('ver-dias/{id}','OracionalController@verDias');
Route::get('detalle-dia/{id}','OracionalController@detalleDias');
Route::post('actualizar-dia/{id}','OracionalController@actualizarDia');
Route::get('crear-dia',function(){
    $oracionales = Oracional::all();
    return view('dia.crear_dia')->with('oracionales',$oracionales);
});



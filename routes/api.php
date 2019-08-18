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

Route::get('oracionales','OracionalController@oracionales');
Route::get('dias/{id}','DiaController@dias');

Route::get('dias-demo/{id}','DiaController@diasDemo');
Route::get('detalle-dia/{id_oracional}/{dia}','DiaController@detalleDia');

Route::post('suscribirme','UserController@suscribirme');

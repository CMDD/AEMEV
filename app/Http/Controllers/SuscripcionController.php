<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oracional;
use App\Suscripcion;
class SuscripcionController extends Controller
{

    public function store(Request $request){
        $suscripcion = new Suscripcion();
        $suscripcion->precio = '';
        $suscripcion->state = true;
        $suscripcion->plan = '1 año';
        $suscripcion->nombre_oracional = $request->oracional['nombre'];
        $suscripcion->portada_oracional = $request->oracional['portada'];
        $suscripcion->mes_oracional = $request->oracional['mes'];
        $suscripcion->ano = $request->oracional['ano'];
        $suscripcion->oracional_id = $request->oracional['id'];
        $suscripcion->user_id =  $request->id;
        $suscripcion->save();
        return response()->json(['status'=>200]);
        

    }
    public function getSuscripciones($id){
       return Suscripcion::where('user_id',$id)->get()->orderBy('id', 'ASC')->get();
    }

    public function getOracionales($nombre){
        
        return Oracional::where('nombre',$nombre)->orderBy('id', 'ASC')->get();
    }
}

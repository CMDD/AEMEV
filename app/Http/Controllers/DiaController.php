<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dia;

class DiaController extends Controller
{
    public function dias($id){
        $dias = Dia::where('oracional_id',$id)->get();
        return $dias;
    }
    public function diasDemo($id){
        $dias = Dia::where('oracional_id',$id)->first();
        return $dias;
    }

    public function detalleDia($id_oracional,$dia){
        return Dia::where('oracional_id',(int)$id_oracional)->where('dia',(int)$dia)->first();
      
    }

    public function crearDia(Request $request){
        

        return $request;
    }
}

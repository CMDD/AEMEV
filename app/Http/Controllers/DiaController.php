<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kid\DiaKid;
use App\Models\jovenes\DiaJoven;
use App\Models\adulto\DiaAdulto;
use App\Models\Puerta\DiaPuerta;

class DiaController extends Controller
{
    public function dias($id){
        $dias = Dia::where('oracional_id',$id)->get();
        return $dias;
    }
    public function diasDemo($dato){
        // $dias = Dia::where('oracional_id',$id)->first();
        return $dato;
    }

    public function detalleDia($id_oracional,$dia){
        return Dia::where('oracional_id',(int)$id_oracional)->where('dia',(int)$dia)->first(); 
    }
    public function crearDia(Request $request){
        return $request;
    }

    // Methods AppMovils
    public function diasKids($id){
        $dias = DiaKid::where('oracional_id',$id)->first();
        return $dias;
    }
    public function diasJovenes($id){
        $dias = DiaJoven::where('oracional_id',$id)->first();
        return $dias;
    }
    public function diasAdultos($id){
        $dias = new DiaAdulto();
        return $dias->getInfoDemo($id);
    }
    public function diasPuerta($id){
        $dias = new DiaPuerta();
        return $dias->getDiaInfo($id);
        // $dias = DiaPuerta::where('oracional_id',$id)->first();
        // return $dias;
    }

     // Methods AppMovils
     public function diasKidsAll($id){
        $dias = DiaKid::where('oracional_id',$id)->orderBy('id','ASC')->get();
        return $dias;
    }
    public function diasJovenesAll($id){
        $dias = DiaJoven::where('oracional_id',$id)->orderBy('dia','ASC')->get();
        return $dias;
    }
    public function diasAdultosAll($id){
        $dias = new DiaAdulto();
        return $dias->getDias($id);
    }
    public function diasPuertaAll($id){
        $dias = new DiaPuerta();
        return $dias->getDias($id);
        // $dias = DiaPuerta::where('oracional_id',$id)->first();
        // return $dias;
    }
}

<?php

namespace App\Http\Controllers\Puerta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Puerta\DiaPuerta;
use App\Models\Puerta\Descripcion;
use App\Models\Puerta\Salmo;
use App\Models\Puerta\Lectura;
use App\Models\Puerta\Evangelio;
use App\Models\Puerta\Reflexion;
use Yajra\Datatables\Datatables;

class PuertaController extends Controller
{
    public function store(Request $request){
        $dia = new DiaPuerta();
        $dia->tipo_dia = $request->tipo_dia;
        $dia->dia = $request->dia;
        $dia->colecta = $request->colecta;
        $dia->nombre_oracional = $request->oracional;
        $dia->fecha = $request->fecha;
        $dia->oracional_id  = $request->id_oracional;
        $dia->save(); 
        //Lectura
        $let = new Lectura();
        $let->store($request,$dia->id);

        //Descripcion
        $des =  new Descripcion();
        $des->store($request,$dia->id);
       
        //Salmo
        $salmo = new Salmo();
        $salmo->store($request,$dia->id);

        //Evangelio
        $ev = new Evangelio();
        $ev->store($request,$dia->id);

        //Reflexion
        $ref = new Reflexion();
        $ref->store($request,$dia->id);
       
       

        return 'Casi';
    }

    public function update(Request $request){
        $dia = DiaPuerta::find($request->id);
        $dia->tipo_dia = $request->tipo_dia;
        $dia->dia = $request->dia;
        $dia->colecta = $request->colecta;
        $dia->fecha = $request->fecha;
        // $dia->oracional_id  = $request->id_oracional;
        $dia->save(); 
        //Lectura
        $let = new Lectura();
        $let->actualizar($request,$dia->id);

        //Descripcion
        $des =  new Descripcion();
        
       
        //Salmo
        $salmo = new Salmo();
        $salmo->actualizar($request,$dia->id);

        //Evangelio
        $ev = new Evangelio();
        $ev->actualizar($request,$dia->id);

        // //Reflexion
        $ref = new Reflexion();
        $ref->actualizar($request,$dia->id);
       
       

        return $ref->actualizar($request,$dia->id);
    }

    public function getDias($id){
        $dias =  DiaPuerta::where('oracional_id',$id)->get();
  
        return Datatables::of($dias)
                  //  ->addColumn('btn','ixtus.partials.botones_suscripcion')
                  ->addColumn('btn', function ($dias) {
                  return '
                  <a class="btn btn-primary btn-sm"   href="' . url('#/editar-'.$dias->nombre_oracional.'/'.$dias->id) . '">
                    <i class="fa fa-eye"></i>
                  </a>';
                  })
                  ->rawColumns(['btn'])
                  ->make(true);
    }
    public function getDia($dia,$oracional){
        $dato = new DiaPuerta();                   
        return $dato->getInfo($dia,$oracional); ;
    }
    public function getDiaAdmin($dia){
        $dato = new DiaPuerta();                   
        return $dato->getDiaAdmin($dia); ;
    }

    
}

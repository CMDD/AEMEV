<?php

namespace App\Http\Controllers\Adulto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\adulto\DiaAdulto;
use App\Models\adulto\TemaDia;
use Yajra\Datatables\Datatables;

class DiaController extends Controller
{
    public function store(Request $request){

        $dia = new DiaAdulto();
        $dia->oracion_manana = $request->oracion_manana;
        $dia->oracion_noche = $request->oracion_noche;
        $dia->tarea_dia = $request->tarea_dia;
        $dia->tipo_dia = $request->tipoDia;
        $dia->dia = $request->dia;
        $dia->oracional_id = $request->oracional_id;
        $dia->nombre_oracional = $request->oracional;
        $dia->save();

        $tema = new TemaDia();
        $tema->titulo = $request->tema[0]['titulo'];
        $tema->contenido = $request->tema[0]['contenido'];
        $tema->oracion = $request->tema[0]['oracion'];
        $tema->dia_adulto_id = $dia->id;
        $tema->save();
        return $request;
    }

    public function getDias($id){
        $dias =  DiaAdulto::where('oracional_id',$id)->get();
  
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

    public function getDia($id,$oracional){

        $dato = new DiaAdulto();              
        return  $dato->getInfo($id,$oracional); 
    }
}

<?php

namespace App\Http\Controllers\Kids;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kid\DiaKid;
use Yajra\Datatables\Datatables;

class DiaController extends Controller
{
    public function store(Request $request){

        $dia = new DiaKid();
        $dia->oracion_manana = $request->oracion_manana;
        $dia->oracion_noche = $request->oracion_noche;
        $dia->tipo_dia = $request->tipoDia;
        $dia->dia = $request->dia;
        $dia->tema_dia = $request->tema_dia;
        $dia->ejercicio = $request->ejercicio;
        $dia->oracional_id = $request->oracional_id;
        $dia->nombre_oracional = $request->oracional;
        $dia->fecha = $request->fecha;
        
        $dia->save();

        return $request;
    }
    public function update(Request $request){

        $dia =  DiaKid::find($request->id);
        $dia->oracion_manana = $request->oracion_manana;
        $dia->oracion_noche = $request->oracion_noche;
        $dia->tipo_dia = $request->tipo_dia;
        $dia->dia = $request->dia;
        $dia->tema_dia = $request->tema_dia;
        $dia->ejercicio = $request->ejercicio;
        
        $dia->save();

        return $request;
    }
    public function getDias($id){
        $dias =  DiaKid::where('oracional_id',$id)->orderby('dia',"ASC")->get();
  
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
        return DiaKid::where('dia',$dia)->where('oracional_id',$oracional)->first();
    }
    public function getDiaAdmin($id){
        return DiaKid::find($id);
    }
}

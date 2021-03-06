<?php

namespace App\Http\Controllers\Jovenes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\jovenes\DiaJoven;
use Yajra\Datatables\Datatables;

class DiaController extends Controller
{
    public function store(Request $request){

        $dia = new DiaJoven();
        $dia->oracion_manana = $request->oracion_manana;
        $dia->title_reflexion = $request->title_reflexion;
        $dia->reflexion = $request->reflexion;
        $dia->tipo_dia = $request->tipo_dia;
        $dia->dia = $request->dia;
        $dia->ejercicio = $request->ejercicio;
        $dia->oracion_noche = $request->oracion_noche;
        $dia->oracional_id = $request->oracional_id;
        $dia->nombre_oracional = $request->oracional;
        $dia->fecha = $request->fecha;

        $dia->save();

        return $request;
    }
    public function update(Request $request){

        $dia = DiaJoven::find($request->id);
        $dia->oracion_manana = $request->oracion_manana;
        $dia->title_reflexion = $request->title_reflexion;
        $dia->reflexion = $request->reflexion;
        $dia->tipo_dia = $request->tipo_dia;
        $dia->dia = $request->dia;
        $dia->ejercicio = $request->ejercicio;
        $dia->oracion_noche = $request->oracion_noche;
        // $dia->fecha = $request->fecha;

        $dia->save();

        return $request;
    }
    public function getDias($id){
        $dias =  DiaJoven::where('oracional_id',$id)->orderBy('dia','ASC')->get();
  
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
        
        return DiaJoven::where('dia',$dia)->where('oracional_id',$oracional)->first();
    }
    public function getDiaAdmin($id){    
        return DiaJoven::find($id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oracional;
use App\Dia;
use App\Models\Editorial;
use Yajra\Datatables\Datatables;
use Response;

class OracionalController extends Controller
{
    public function store(Request $request){
        if($request->file('portada')){
        $oracional = new Oracional();
        $oracional->nombre = $request->oracional;
        $oracional->estado = "Desactivo";
        $oracional->mes = $request->mes;
        $oracional->ano = $request->ano;
        $oracional->portada = $request->file('portada')->store("portadas");
        $oracional->save();

        $editorial = new Editorial();
        $editorial->titulo = $request->editorial_titulo;
        $editorial->contenido = $request->editorial_contenido;
        $editorial->autor = $request->editorial_autor;
        $editorial->oracional_id = $oracional->id;
        $editorial->save();
        return 200;

        }else{
            return 500;
        }
        
        
    }

    public function lista(){
        $oracionales =  Oracional::orderBy('id','DESC');
  
        return Datatables::of($oracionales)
                  //  ->addColumn('btn','ixtus.partials.botones_suscripcion')
                  ->addColumn('btn', function ($oracionales) {
                  return '
                  <a class="btn btn-primary btn-sm"   href="' . url('#/detalle-oracional/'.$oracionales->id) . '">
                    <i class="fa fa-eye"></i>
                  </a> <a class="btn btn-primary btn-sm"  href="' . url('#/'.$oracionales->nombre.'/'.$oracionales->id) . '">
                  <i class="fa fa-plus"></i>
                </a> ';
                  })
                  ->rawColumns(['btn'])
                  ->make(true);
      }
      public function detail($id){
        return Oracional::find($id);
      }
    public function detalleOracional($id){
        $oracional = Oracional::find($id);
        return view('oracional.detalle')->with('oracional',$oracional);

    }
    public function actualizarOracional(Request $request,$id){
        $oracional = Oracional::find($id);
        $oracional->nombre = $request->nombre;
        $oracional->estado = $request->estado;
        $oracional->mes = $request->mes;
        $oracional->ano = $request->ano;
        $oracional->descripcion = $request->descripcion;
        if($request->file('portada')){
          $oracional->portada = $request->file('portada')->store("portadas");
        }      
        $oracional->save();
        return view('oracional.detalle')->with('oracional',$oracional);
    }
    public function crearDia(Request $request){
        $dia = new  Dia();
        $dia->autor = "ALBERTO LIBERO";
        $dia->mes = $request->mes;
        $dia->dia = $request->dia;
        $dia->tarea_del_dia = $request->tarea_del_dia;
        $dia->editorial = $request->editorial;
        $dia->oracion_de_la_manana = $request->oracion_de_la_manana;
        $dia->tema_del_dia = $request->tema_del_dia;
        $dia->oracion_de_la_noche = $request->oracion_de_la_noche;
        $dia->portada = $request->portada;
        $dia->oracional_id = (int)$request->oracional;
        $dia->save();
        return $request;
    }
    public function oracionales(){
        $oracionales = Oracional::orderBy('id','desc')->where('estado',"Activo")->get();
        return Response::json($oracionales);
    }
    public function editorial($id){
        return Editorial::where('oracional_id',$id)->first();
    }

    public function verDias($id){
        $dias = Dia::where('oracional_id',$id)->get();
        return view('dia.dias')->with('dias',$dias);
    }
    public function detalleDias($id){
        $dia = Dia::find($id);
        $oracionales = Oracional::all();
        return view('dia.detalle')->with('dia',$dia)->with('oracionales',$oracionales);
    }
    public function actualizarDia(Request $request,$id){
        $dia = Dia::find($id);
        $dia->autor = "ALBERTO LIBERO";
        $dia->fecha = $request->fecha;
        $dia->tarea_del_dia = $request->tarea_del_dia;
        $dia->editorial = $request->editorial;
        $dia->oracion_de_la_manana = $request->oracion_de_la_manana;
        $dia->tema_del_dia = $request->tema_del_dia;
        $dia->oracion_de_la_noche = $request->oracion_de_la_noche;
        $dia->portada = $request->portada;
        $dia->oracional_id = (int)$request->oracional;
        $dia->save();
        $oracionales = Oracional::all();
        return view('dia.detalle')->with('dia',$dia)->with('oracionales',$oracionales);
    }

   
}

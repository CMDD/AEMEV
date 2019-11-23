<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oracional;
use App\Suscripcion;
use Yajra\Datatables\Datatables;
class SuscripcionController extends Controller
{

    public function store(Request $request){

        $result = Suscripcion::where('nombre_oracional',$request->oracional['nombre'])
                ->where('user_id',$request->id)->first();

         if (!$result) {
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

         return response()->json(['status'=>100]);
        

    }
    public function getSuscripciones($id){

       return Suscripcion::where('user_id',$id)->orderBy('id', 'DESC')->get();
    }

    public function getOracionales($nombre){
        
        return Oracional::where('nombre',$nombre)->orderBy('id', 'ASC')->get();
    }

    // Administración
    public function suscripciones(){
        $sus = Suscripcion::all();
        return Datatables::of($sus)
      //  ->addColumn('btn','ixtus.partials.botones_suscripcion')
      ->addColumn('btn', function ($sus) {
      return '
      <a class="btn btn-primary btn-sm"   href="' . url('#/detalle-oracional/'.$sus->id) . '">
        <i class="fa fa-eye"></i>
      </a> <a class="btn btn-primary btn-sm"  href="' . url('#/'.$sus->name.'/'.$sus->id) . '">
      <i class="fa fa-plus"></i>
    </a> ';
      })
      ->rawColumns(['btn'])
      ->make(true);
    }

    public function updateStateSuscription($id){
      $sus = Suscripcion::find($id);
      $sus->state = !$sus->state;
      $sus->save();

      return $sus;

    }
}

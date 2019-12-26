<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oracional;
use App\Suscripcion;
use Yajra\Datatables\Datatables;
class SuscripcionController extends Controller
{

    public function store(Request $request){

    // return response()->json(['status'=>200]);
        // $result = Suscripcion::where('nombre_oracional',$request->oracional['nombre'])
        //         ->where('user_id',$request->id)->first();

            $suscripcion = new Suscripcion();
            $suscripcion->precio = '3500';
            $suscripcion->state = true;
            $suscripcion->plan = '1 mes';
            $suscripcion->user_id =  $request->id;

            $suscripcion->orderId =  $request->orderId;
            $suscripcion->purchaseState =  $request->purchaseState;
            $suscripcion->productId =  $request->productId;
            $suscripcion->purchaseToken =  $request->purchaseToken;


            $suscripcion->save();
            return response()->json(['status'=>200]);
         
               
    }
    public function getSuscripciones($id){
      $result = Suscripcion::where('user_id',$id)->where('state',1)->first();
      if($result){
        return Oracional::where('estado','Activo')->orderBy('nombre')->orderBy('id','DESC')->get();
      }else{
        return response()->json(['status'=>100]);
      }
     
       
    }

    public function getOracionales($nombre){
        
        return Oracional::where('nombre',$nombre)->orderBy('nombre')->orderBy('id', 'DESC')->get();
    }

    // Administración
    public function suscripciones(){
        $sus = Suscripcion::all();
        return Datatables::of($sus)
      //  ->addColumn('btn','ixtus.partials.botones_suscripcion')
      ->addColumn('usuario', function($sus){
        return $sus->users->email;
      })
      ->addColumn('btn', function ($sus) {
      return '
      <a class="btn btn-primary btn-sm"   href="' . url('#/'.$sus->id) . '">
        <i class="fa fa-eye"></i>
      </a> <a class="btn btn-primary btn-sm"  href="' . url('#/'.$sus->name.'/'.$sus->id) . '">
      <i class="fa fa-plus"></i>
    </a> ';
      })
      ->rawColumns(['btn'])
      ->make(true);
    }

    public function adminSuscripciones($id){

      return Suscripcion::where('user_id',$id)->orderBy('id', 'DESC')->get();
   }

    public function updateStateSuscription($id){
      $sus = Suscripcion::find($id);
      $sus->state = !$sus->state;
      $sus->save();

      return $sus;

    }

    public function adminStoreSuscription(Request $request){
           $suscripcion = new Suscripcion();
            $suscripcion->precio = '3500';
            $suscripcion->state = true;
            $suscripcion->plan = $request->plan;
            $suscripcion->user_id =  $request->id;
            $suscripcion->save();
            return response()->json(['status'=>200]);
      
    }
   
}

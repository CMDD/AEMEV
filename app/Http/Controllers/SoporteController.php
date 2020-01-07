<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soporte;
use Yajra\Datatables\Datatables;
use Mail;
use App\Mail\SoporteMail;

class SoporteController extends Controller
{
    public function store(Request $request){
        $soporte = new Soporte();
        $soporte->comentario = $request['comentario'];
        $soporte->user_id =(int) $request['id'];
        $soporte->estado = 'Abierto';
        $soporte->save();
        return response()->json(['status'=>200]);

    }

    public function index($tipo){
        $soporte = Soporte::where('estado',$tipo)->orderBy('id','DESC');
        return Datatables::of($soporte)
      //  ->addColumn('btn','ixtus.partials.botones_suscripcion')
      ->addColumn('name', function($soporte){
        return $soporte->users->name;
      })
      ->addColumn('usuario', function($soporte){
        return $soporte->users->email;
      })
      ->addColumn('btn', function ($soporte) {
      return '
      <a class="btn btn-primary btn-sm"   href="' . url('#/edit-soporte/'.$soporte->id) . '">
        <i class="fa fa-eye"></i>
      </a>';
      })
      ->rawColumns(['btn'])
      ->make(true);
    }

    public function show($id){
      $soporte = Soporte::find($id);
      $soporte->users;
      return $soporte;
    }

    public function update(Request $request){
      $soporte = Soporte::find($request->id);
      $soporte->estado = $request->estado;
      $soporte->save();
      return response()->json(['status'=>200]);
    }


    public function envioMail(Request $request){

      $soporte = new Soporte();
      $soporte->comentario = $request['mensaje'];
      $soporte->user_id =(int) $request['user_id'];
      $soporte->tipo = "Respuesta";
      $soporte->save();
      
      Mail::to($request->email)
            ->send(new SoporteMail($request));
      return response()->json(['status'=>200]);
    }
}

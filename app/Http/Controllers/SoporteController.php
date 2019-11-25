<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soporte;
use Yajra\Datatables\Datatables;

class SoporteController extends Controller
{
    public function store(Request $request){
        $soporte = new Soporte();
        $soporte->name = $request['name'];
        $soporte->comentario = $request['comentario'];
        $soporte->user_id = $request['id'];
        $soporte->save();
        return response()->json(['status'=>200]);

    }

    public function index(){
        $soporte = Soporte::all();
        return Datatables::of($soporte)
      //  ->addColumn('btn','ixtus.partials.botones_suscripcion')
      ->addColumn('usuario', function($soporte){
        return $soporte->users;
      })
      ->addColumn('btn', function ($soporte) {
      return '
      <a class="btn btn-primary btn-sm"   href="' . url('#/'.$soporte->id) . '">
        <i class="fa fa-eye"></i>
      </a> <a class="btn btn-primary btn-sm"  href="' . url('#/'.$soporte->name.'/'.$soporte->id) . '">
      <i class="fa fa-plus"></i>
    </a> ';
      })
      ->rawColumns(['btn'])
      ->make(true);
    }
}

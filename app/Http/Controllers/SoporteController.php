<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soporte;

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
}

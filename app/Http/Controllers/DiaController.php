<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dia;

class DiaController extends Controller
{
    public function dias($id){
        $dias = Dia::where('oracional_id',$id)->get();
        return $dias;
    }
    public function diasDemo($id){
        $dias = Dia::where('oracional_id',$id)->paginate(15);
        return $dias;
    }
}

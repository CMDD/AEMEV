<?php

namespace App\Models\Puerta;

use Illuminate\Database\Eloquent\Model;
use App\Models\Puerta\DiaPuerta;

class Descripcion extends Model
{
    public function store($request,$id){
        $des = new Descripcion();
        $des->contenido = $request->descripcion;
        $des->dia_puerta_id = $id;
        $des->save();
        return 200;
    }

    public function diaPuerta(){
        return $this->belongsTo(DiaPuerta::class,'dia_puerta_id');
    }
}

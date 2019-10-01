<?php

namespace App\Models\Puerta;

use Illuminate\Database\Eloquent\Model;

class Descripcion extends Model
{
    public function store($request,$id){
        $des = new Descripcion();
        $des->contenido = $request->descripcion;
        $des->dia_puerta_id = $id;
        $des->save();
        return 200;
    }
}

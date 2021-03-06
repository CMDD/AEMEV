<?php

namespace App\Models\Puerta;

use Illuminate\Database\Eloquent\Model;

class Reflexion extends Model
{
    public function store($request,$id){
        $ref = new Reflexion();
        $ref->titulo = $request->reflexion[0]['titulo'];
        $ref->contenido = $request->reflexion[0]['contenido'];
        $ref->oracion = $request->reflexion[0]['oracion'];
        $ref->dia_puerta_id = $id;
        $ref->save();

    }
    public function actualizar($request,$id){
        $ref = Reflexion::find($id);
        $ref->titulo = $request->reflexion['titulo'];
        $ref->contenido = $request->reflexion['contenido'];
        $ref->oracion = $request->reflexion['oracion'];
        $ref->save();

        return $request;

    }
}

<?php

namespace App\Models\Puerta;

use Illuminate\Database\Eloquent\Model;

class Evangelio extends Model
{
    public function store($request,$id){
        $ev = new Evangelio();
        $ev->titulo = $request->evangelio[0]['titulo'];
        $ev->contenido = $request->evangelio[0]['contenido'];
        $ev->dia_puerta_id = $id;
        $ev->save();

        return 'desde evangelio';

    }

    public function actualizar($request,$id){
        $ev = Evangelio::find($id);
        $ev->titulo = $request->evangelio['titulo'];
        $ev->contenido = $request->evangelio['contenido'];
        $ev->save();

        return $request->evangelio['contenido'];

    }
}

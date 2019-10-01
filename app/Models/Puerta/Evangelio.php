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
}

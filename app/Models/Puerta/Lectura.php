<?php

namespace App\Models\Puerta;

use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    public function store($request,$id){

        foreach ($request->lecturas as $value) {
            $let = new Lectura();
            $let->titulo = $value['titulo'];
            $let->cita = $value['cita'];
            $let->contenido = $value['contenido'];
            $let->diapuerta_id = $id;
            $let->save();
        }
       
    }
}

<?php

namespace App\Models\Puerta;

use Illuminate\Database\Eloquent\Model;

use App\Models\Puerta\Versiculo;

class Salmo extends Model
{
    public function store($request,$id){

        foreach ($request->salmos as $value) {
            $salmo = new Salmo();
            $salmo->cita =  $value['salmo'];
            $salmo->respuesta =  $value['respuesta'];
            $salmo->dia_puerta_id = $id;
            $salmo->save();

            foreach ($value['versiculo'] as $dato) {
                $ver = new Versiculo();
                $ver->contenido = $dato['dato'];
                $ver->salmo_id = $salmo->id;  
                $ver->save();             
            }  
        }

        
        return 'desde salmo model';
        
        
    }
}

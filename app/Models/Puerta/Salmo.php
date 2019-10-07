<?php

namespace App\Models\Puerta;

use Illuminate\Database\Eloquent\Model;

use App\Models\Puerta\Versiculo;

class Salmo extends Model
{
    public function versiculos(){
        return $this->hasMany(Versiculo::class,'salmo_id');
    }

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
    public function actualizar($request,$id){

        foreach ($request->salmos as $value) {

            if (isset($value['dia_puerta_id'])) {
                $salmo = Salmo::find($value['id']);
                $salmo->cita =  $value['cita'];
                $salmo->respuesta =  $value['respuesta'];
                $salmo->save();

                if(isset($value['versiculo'])){
                    foreach ($value['versiculo'] as $dato) {
                        $ver =  Versiculo::find($dato['id']);
                        $ver->contenido = $dato['dato']; 
                        $ver->save();             
                    } 
                }

                 
            } else {
                foreach ($request->salmos as $value) {
                    $salmo = new Salmo();
                    $salmo->cita =  $value['cita'];
                    $salmo->respuesta =  $value['respuesta'];
                    $salmo->dia_puerta_id = $id;
                    $salmo->save();
        
                    // foreach ($value['versiculo'] as $dato) {
                    //     $ver = new Versiculo();
                    //     $ver->contenido = $dato['dato'];
                    //     $ver->salmo_id = $salmo->id;  
                    //     $ver->save();             
                    // }  
                }
            }

            
        }

        
        return 'desde salmo model';
        
        
    }
}

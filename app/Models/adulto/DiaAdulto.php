<?php

namespace App\Models\adulto;

use Illuminate\Database\Eloquent\Model;
use App\Models\adulto\TemaDia;
use App\Models\adulto\DiaAdulto;

class DiaAdulto extends Model
{
    public function tema(){
        return $this->hasOne(TemaDia::class,'dia_adulto_id');
    }

    public function getInfo($id,$oracional){
        $datos = DiaAdulto::where('dia',$id)->where('oracional_id',$oracional)->first();
        $datos->tema;
        return $datos;
    }
    public function getInfoDemo($id){
        $datos = DiaAdulto::find($id);
        $datos->tema;
        return $datos;
    }
    public function getDias($id){
        $datos = DiaAdulto::where('oracional_id',$id)->orderBy('id','ASC')->get();
        // $datos->tema;
        return $datos;
    }
}

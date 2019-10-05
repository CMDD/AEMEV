<?php

namespace App\Models\Puerta;

use Illuminate\Database\Eloquent\Model;

use App\Oracional;
use App\Models\Puerta\Descripcion;
use App\Models\Puerta\Lectura;
use App\Models\Puerta\Salmo;
use App\Models\Puerta\Evangelio;
use App\Models\Puerta\Reflexion;

class DiaPuerta extends Model
{
    public function oracionalInfo(){
        return $this->belongsTo(Oracional::class,'oracional_id');
    }
    public function descripcion(){
        return $this->hasOne(Descripcion::class,'dia_puerta_id');
    }
    public function lecturas(){
        return $this->hasMany(Lectura::class,'diapuerta_id');
    }
    public function salmos(){
        return $this->hasMany(Salmo::class,'dia_puerta_id');
    }
    public function evangelio(){
        return $this->hasOne(Evangelio::class,'dia_puerta_id');
    }
    public function reflexion(){
        return $this->hasOne(Reflexion::class,'dia_puerta_id');
    }

    public function getInfo($id){
        $dato = DiaPuerta::find($id);
        $dato->oracionalInfo;
        $dato->descripcion;
        $dato->lecturas;
        $dato->salmos;
        $dato->evangelio;
        $dato->reflexion;
        return $dato;
    }
}

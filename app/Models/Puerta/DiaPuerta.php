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

    public function getInfo($dia,$oracional){
        $dato = DiaPuerta::where('dia',$dia)->where('oracional_id',$oracional)->first();
        $dato->oracionalInfo;
        $dato->descripcion;
        $dato->lecturas;
        $dato->salmos;
        // $dato->versiculos = $dato->salmos->versiculos;
        $dato->evangelio;
        $dato->reflexion;
        return $dato;
    }
    public function getDiaAdmin($id){
        $dato = DiaPuerta::find($id);
        $dato->oracionalInfo;
        $dato->descripcion;
        $dato->lecturas;
        $dato->salmos;
        $dato->versiculos;
        $dato->evangelio;
        $dato->reflexion;
        return $dato;
    }
    

    // Methods para appsMovil
    public function getDiaInfo($id){
        $dato = DiaPuerta::where('oracional_id',$id)->first();
        $dato->oracionalInfo;
        $dato->descripcion;
        $dato->lecturas;
        $dato->salmos;
        $dato->versiculos;
        $dato->evangelio;
        $dato->reflexion;
        return $dato;
    }
    public function getDias($id){
        $dato = DiaPuerta::where('oracional_id',$id)->orderBy('id','ASC')->get();
        return $dato;
    }
}

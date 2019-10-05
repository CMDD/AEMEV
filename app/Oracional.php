<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Puerta\DiaPuerta;

class Oracional extends Model
{

    public function diaPuerta(){
        return $this->hasMany(DiaPuerta::class);
    }
}

<?php

namespace App\Models\Puerta;

use Illuminate\Database\Eloquent\Model;
use App\Models\Puerta\Salmo;

class Versiculo extends Model
{

    public function salmo(){
        return $this->belongsTo(Salmo::class,'salmo_id');
    }
     
}

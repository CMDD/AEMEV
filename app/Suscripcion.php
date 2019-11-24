<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Suscripcion extends Model
{
    public function users(){
        return $this->belongsTo(User::class,"user_id");    
    }
    
}

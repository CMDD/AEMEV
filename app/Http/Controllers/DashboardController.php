<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Suscripcion;
use App\Oracional;

class DashboardController extends Controller
{
    public function index(){

        $datos = new Request();
        $datos['suscripciones'] = Suscripcion::count();
        $datos['usuarios'] = User::count();
        $datos['oracionales'] = Oracional::count();
       
        return $datos;
    }
}

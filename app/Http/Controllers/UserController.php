<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function suscribirme(Request $request){

        return $request;
        
    }

    public function login(Request $request){


      if (Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])) {

        $user = User::where('email',$request->email)->get();
        return response()->json(['status' => 200, 'data' => $user]);
      }else{
        return $request;
      }
    }

    public function registro(Request $request){
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->save();
      if (Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])) {
        
        return response()->json(['status' => 200, 'data' => $user]);
      }else{
        return 400;
      }

        
    }

    //Administración
    public function users(){
      $users =  User::all();
      return Datatables::of($users)
      //  ->addColumn('btn','ixtus.partials.botones_suscripcion')
      ->addColumn('btn', function ($users) {
      return '
      <a class="btn btn-primary btn-sm"   href="' . url('#/detalle-oracional/'.$users->id) . '">
        <i class="fa fa-eye"></i>
      </a> <a class="btn btn-primary btn-sm"  href="' . url('#/'.$users->name.'/'.$users->id) . '">
      <i class="fa fa-plus"></i>
    </a> ';
      })
      ->rawColumns(['btn'])
      ->make(true);
    }
}

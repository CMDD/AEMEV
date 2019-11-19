<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

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
}

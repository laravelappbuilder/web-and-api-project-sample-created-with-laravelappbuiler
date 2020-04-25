<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(Request $request){
      $validatedData = $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:6'
      ]);

      $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
          $accessToken = auth()->user()->createToken('accessToken')->accessToken;
            // Authentication passed...
            return response(['user'=>auth()->user(),'access_token'=>$accessToken]);
        }else {
          abort(422,'Invalid Credentials');
        }
    }
}

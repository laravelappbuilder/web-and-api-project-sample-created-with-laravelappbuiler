<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function register(Request $request){
      $validatedData = $request->validate([
        'name'=>'required|string|max:60',
        'email'=>'required|email|unique:users',
        'password'=>'required|string|confirmed'
      ]);

      $validatedData['password'] = bcrypt($request->password);

      $user = User::create($validatedData);

      $accessToken = $user->createToken('accessToken')->accessToken;

      return response(['user'=>$user,'access_token'=>$accessToken]);
    }
}

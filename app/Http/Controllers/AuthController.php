<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Hash;
use Validator;

class AuthController extends Controller{

  public function authenticate(Request $request) {

    $this->validateData($request);

    $credentials = $request->only('email', 'password');
    $user        = User::where('email', $credentials['email'])->first();

    if(!$user) {
      return response()->json([
        'error' => 'Invalid credentials'
      ], 401);
    }

    if (!Hash::check($credentials['password'], $user->password)) {
        return response()->json([
          'error' => 'Invalid credentials'
        ], 401);
    }

    $token       = JWTAuth::fromUser($user);
    $objectToken = JWTAuth::setToken($token);
    $expiration  = JWTAuth::decode($objectToken->getToken())->get('exp');

    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => JWTAuth::decode($objectToken->getToken())->get('exp'),
      'user'       => $user
    ]);
  }

  protected function validateData(Request $request){
      $validator = Validator::make($request->all(), [
          'email' => 'required',
          'password'    => 'required'
      ]);

      if($validator->fails()) {
          return response()->json([
              'message'   => 'Invalid credentials',
              'errors'    => $validator->errors()->all()
          ], 422);
      }
  }
}

<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
  public function login(LoginRequest $request)
  {
    $credintials = $request->only('email', 'password');
    $token = auth('api')->attempt($credintials);
    if (!$token) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }
    return response()->json([
      'access_token' => $token,
      // 'expires_in' => auth('api')->factory('')->create(),
      'expires_in' => config('jwt.ttl') * 60
    ]);
  }
        public function refresh()
    {
        $token = JWTAuth::getToken();
        $newToken = JWTAuth::refresh($token);
        return response()->json([
            'access_token' => $newToken,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60
        ]);
    }
  public function logout()
  {
    auth('api')->logout();
    return response()->json(['message' => 'Successfully logged out']);
  }


  public function me()
  {
    $user = auth('api')->user();
    if (!$user) {
      return response()->json(['error' => 'Unauthenticated'], 401);
    }
    return response()->json($user);
  }
}

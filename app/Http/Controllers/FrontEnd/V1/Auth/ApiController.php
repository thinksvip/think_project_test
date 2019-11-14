<?php

namespace App\Http\Controllers\FrontEnd\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Repositories\Auth\CreateUser;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    public function authenticate(AuthenticateRequest $request)
    {
        $credentials = $request->only('mobile', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json([
            'token' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => JWTAuth::factory()->getTTL() * 60
            ]
        ],201);
    }

    public function register(RegisterAuthRequest $request)
    {
        $user = app(CreateUser::class)->execute($request->only(['email','mobile','password','name']));

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'user' => $user,
            'token' =>[
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => JWTAuth::factory()->getTTL() * 60
            ]
        ],201);

    }

    public function logout()
    {
        JWTAuth::parseToken()->invalidate();
        return response()->json(['message' => 'Successfully logged out']);
    }
}

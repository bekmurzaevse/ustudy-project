<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Core\v1\Auth\LoginAction;
use App\Actions\Core\v1\Auth\RefreshTokenAction;
use App\Dto\Core\v1\Auth\LoginDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\TokenAbilityEnum;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{

    public function login(LoginRequest $request, LoginAction $action): JsonResponse
    {
        return $action(LoginDto::from($request));
    }

    public function refreshToken(RefreshTokenAction $action)
    {
        // $accessTokenExpiration = now()->addMinutes(config('sanctum.ac_expiration'));

        // $accessToken =  auth()->user()->createToken(
        //     name: 'access token',
        //     abilities: [TokenAbilityEnum::ACCESS_TOKEN->value],
        //     expiresAt: $accessTokenExpiration
        // );

        // return response()->json([
        //     'access_token' => $accessToken->plainTextToken,
        //     'at_expired_at' => $accessTokenExpiration->format('Y-m-d H:i:s'),
        // ]);
        return $action();
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => "You're logout"
        ]);
    }

}

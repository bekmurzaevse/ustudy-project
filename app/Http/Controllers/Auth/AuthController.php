<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\TokenAbilityEnum;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        try{
            $user = User::where("email", $request->email)->firstOrFail();
            if(!Hash::check($request->password, $user->password)){
                throw new AuthenticationException();
            }
            auth()->login($user);


            return response()->json([
                'token'=> $user->createToken('core api')->plainTextToken,
            ]);
        }catch(ModelNotFoundException $e){
            throw new ModelNotFoundException("Paydalaniwshi tabilmadi!");
        }
    }

    public function test(LoginRequest $request)
    {
        return "TEST";
    }

    public function refreshToken()
    {
        $accessTokenExpiration = now()->addMinutes(config('sanctum.ac_expiration'));

        $accessToken =  auth()->user()->createToken(
            name: 'access token',
            abilities: [TokenAbilityEnum::ACCESS_TOKEN->value],
            expiresAt: $accessTokenExpiration
        );

        return response()->json([
            'access_token' => $accessToken->plainTextToken,
            'at_expired_at' => $accessTokenExpiration->format('Y-m-d H:i:s'),
        ]);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => "You're logout"
        ]);
    }

}

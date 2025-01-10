<?php

namespace App\Actions\Core\v1\Auth;

use App\TokenAbilityEnum;

class RefreshTokenAction
{

    public function __invoke()
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


}

<?php

namespace App\Dto\Core\v1\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Mail;

class LoginDto
{

    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $email,
        public string $password,
    ){}

    public static function from(LoginRequest $request): self
    {
        return new self(
            email: $request->get('email'),
            password: $request->get('password')
        );
    }

}

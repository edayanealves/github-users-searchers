<?php

namespace App\Services;

use App\Domain\UseCases\AuthenticateUserAndReturnTokenUseCase;
use Illuminate\Support\Facades\Auth;

class AuthService
{


    public function __construct(
        protected AuthenticateUserAndReturnTokenUseCase $authenticateUserAndReturnTokenUseCase
    )
    {
    }

    public function handleAuthentication($data): array
    {
        $token = $this->authenticateUserAndReturnTokenUseCase->handle($data);
        $user = Auth::user();
        return [
            'status' => 'success',
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]];
    }
}

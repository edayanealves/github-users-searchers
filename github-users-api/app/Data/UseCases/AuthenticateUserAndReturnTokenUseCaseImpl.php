<?php

namespace App\Data\UseCases;

use App\Domain\UseCases\AuthenticateUserAndReturnTokenUseCase;

class AuthenticateUserAndReturnTokenUseCaseImpl implements AuthenticateUserAndReturnTokenUseCase
{

    public function handle(array $credentials)
    {
        return auth()->attempt($credentials);
    }
}

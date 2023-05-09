<?php

namespace App\Domain\UseCases;

interface AuthenticateUserAndReturnTokenUseCase
{
    public function handle(array $credentials);
}

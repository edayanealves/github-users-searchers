<?php

namespace App\Domain\UseCases;

interface RetrieveGithubUserByUsernameUseCase
{
    public function handle(string $username): array;
}

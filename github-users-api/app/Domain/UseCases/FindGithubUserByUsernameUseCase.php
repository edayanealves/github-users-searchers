<?php

namespace App\Domain\UseCases;

use App\Models\GithubUser;

interface FindGithubUserByUsernameUseCase
{
    public function handle(string $username, int $userId): ?GithubUser;

}

<?php

namespace App\Domain\UseCases;

use App\Models\GithubUser;

interface UpdateGithubUserUseCase
{
    public function handle(int $id, array $data): ?GithubUser;
}

<?php

namespace App\Data\Contracts\Repositories;

use App\Models\GithubUser;

interface FindGithubUserByUsernameRepository
{
    public function findGithubUserByUsername(string $username, int $userId): ?GithubUser;
}

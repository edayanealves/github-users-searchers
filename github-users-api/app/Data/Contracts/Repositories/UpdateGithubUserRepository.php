<?php

namespace App\Data\Contracts\Repositories;

use App\Models\GithubUser;

interface UpdateGithubUserRepository
{
    public function updateGithubUser($id, $data): ?GithubUser;
}

<?php

namespace App\Data\Contracts\Repositories;

interface DeleteGithubUserRepository
{
    public function deleteGithubUser(int $githubUserId, int $userID): void;
}

<?php

namespace App\Data\Contracts\Repositories;

interface CreateGithubUserRepository
{
    public function createGithubUser(array $data);
}

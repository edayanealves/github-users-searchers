<?php

namespace App\Data\Contracts\Repositories;

use Illuminate\Support\Collection;

interface RetrieveSavedGithubUsersByAuthenticatedUserRepository
{
    public function retrieveGithubUsers(int $userId): Collection;

}

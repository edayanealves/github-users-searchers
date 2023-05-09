<?php

namespace App\Domain\UseCases;

use Illuminate\Support\Collection;

interface RetrieveGithubUsersByAuthenticatedUserUseCase
{
    public function handle(int $userId): Collection;
}

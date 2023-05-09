<?php

namespace App\Data\UseCases;

use App\Data\Contracts\Repositories\RetrieveSavedGithubUsersByAuthenticatedUserRepository;
use App\Domain\UseCases\RetrieveGithubUsersByAuthenticatedUserUseCase;
use Illuminate\Support\Collection;

class RetrieveGithubUsersByAuthenticatedUserUseCaseImpl implements RetrieveGithubUsersByAuthenticatedUserUseCase
{


    public function __construct(
        protected RetrieveSavedGithubUsersByAuthenticatedUserRepository $repository
    )
    {
    }

    public function handle(int $userId): Collection
    {
        return $this->repository->retrieveGithubUsers($userId);
    }
}

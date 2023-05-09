<?php

namespace App\Data\UseCases;

use App\Data\Contracts\Repositories\FindGithubUserByUsernameRepository;
use App\Domain\UseCases\FindGithubUserByUsernameUseCase;
use App\Models\GithubUser;

class FindGithubUserByUsernameUseCaseImpl implements FindGithubUserByUsernameUseCase
{


    public function __construct(
        protected FindGithubUserByUsernameRepository $repository
    )
    {
    }

    public function handle(string $username, int $userId): ?GithubUser
    {
        return $this->repository->findGithubUserByUsername($username, $userId);
    }
}

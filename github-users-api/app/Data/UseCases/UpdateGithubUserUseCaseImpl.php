<?php

namespace App\Data\UseCases;

use App\Data\Contracts\Repositories\UpdateGithubUserRepository;
use App\Domain\UseCases\UpdateGithubUserUseCase;
use App\Models\GithubUser;

class UpdateGithubUserUseCaseImpl implements UpdateGithubUserUseCase
{


    public function __construct(
        protected UpdateGithubUserRepository $repository
    )
    {
    }

    public function handle(int $id, array $data): ?GithubUser
    {
        return $this->repository->updateGithubUser($id, $data);
    }
}

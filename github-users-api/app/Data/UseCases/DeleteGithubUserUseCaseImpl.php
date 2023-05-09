<?php

namespace App\Data\UseCases;

use App\Data\Contracts\Repositories\DeleteGithubUserRepository;
use App\Domain\UseCases\DeleteGithubUserUseCase;

class DeleteGithubUserUseCaseImpl implements DeleteGithubUserUseCase
{


    public function __construct(
        protected DeleteGithubUserRepository $repository
    )
    {
    }

    public function handle(int $githubUserid, int $userId): void
    {
        $this->repository->deleteGithubUser($githubUserid, $userId);
    }
}

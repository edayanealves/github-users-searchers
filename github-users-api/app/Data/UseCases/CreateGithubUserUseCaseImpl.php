<?php

namespace App\Data\UseCases;

use App\Data\Contracts\Repositories\CreateGithubUserRepository;
use App\Domain\UseCases\CreateGithubUserUseCase;

class CreateGithubUserUseCaseImpl implements CreateGithubUserUseCase
{


    public function __construct(
        protected CreateGithubUserRepository $repository
    )
    {
    }

    public function handle(array $data)
    {
        return $this->repository->createGithubUser($data);
    }
}

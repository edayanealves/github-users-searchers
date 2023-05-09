<?php

namespace App\Data\UseCases;

use App\Data\Contracts\Repositories\CreateUserRepository;
use App\Domain\UseCases\CreateUserUseCase;

class CreateUserUseCaseImpl implements CreateUserUseCase
{


    public function __construct(
        protected CreateUserRepository $createUserRepository
    )
    {
    }

    public function handle(array $data)
    {
        return $this->createUserRepository->createUser($data);
    }
}

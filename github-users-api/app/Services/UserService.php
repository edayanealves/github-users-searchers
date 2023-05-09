<?php

namespace App\Services;

use App\Domain\UseCases\CreateUserUseCase;
use App\Http\Resources\UserResource;

class UserService
{


    public function __construct(
        protected CreateUserUseCase $createUserUseCase
    )
    {
    }

    public function handleUserCreate(array $data) {
        $data['password'] = bcrypt($data['password']);

        $user = $this->createUserUseCase->handle($data);

        return new UserResource($user);
    }
}

<?php

namespace App\Infraesctructure\Adapter\Mysql;

use App\Data\Contracts\Repositories\CreateUserRepository;
use App\Models\User;

class UserMysqlRepositoryAdapter implements CreateUserRepository
{
    public function __construct(
        protected User $model
    )
    {
    }

    public function createUser(array $data)
    {

        return $this->model->create($data);
    }
}

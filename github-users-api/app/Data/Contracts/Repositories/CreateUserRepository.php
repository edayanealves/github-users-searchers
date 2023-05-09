<?php

namespace App\Data\Contracts\Repositories;

interface CreateUserRepository
{
    public function createUser(array $data);
}

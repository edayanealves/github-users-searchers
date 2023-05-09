<?php

namespace App\Domain\Gateways\Github;

interface RetrieveGithubUserGateway
{
    public function getGithubUserByUsernameGateway(string $username): array;
}

<?php

namespace App\Data\UseCases;

use App\Domain\Gateways\Github\RetrieveGithubUserGateway;
use App\Domain\UseCases\RetrieveGithubUserByUsernameUseCase;

class RetrieveGithubUserByUsernameUseCaseImpl implements RetrieveGithubUserByUsernameUseCase
{


    public function __construct(
        protected RetrieveGithubUserGateway $gateway
    )
    {
    }

    public function handle(string $username): array
    {
        return $this->gateway->getGithubUserByUsernameGateway($username);
    }
}

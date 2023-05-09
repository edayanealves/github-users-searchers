<?php

namespace App\Data\UseCases;

use App\Domain\Gateways\Github\RetrieveNominatimLocationInfoGateway;
use App\Domain\UseCases\RetrieveNominatimLocationInfoUseCase;

class RetrieveNominatimLocationInfoUseCaseImpl implements RetrieveNominatimLocationInfoUseCase
{
    public function __construct(
        protected RetrieveNominatimLocationInfoGateway $gateway
    )
    {
    }

    public function handle(string $location): array
    {
        return $this->gateway->retrieveLocationInfo($location);
    }
}

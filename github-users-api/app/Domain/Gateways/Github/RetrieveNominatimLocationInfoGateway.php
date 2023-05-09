<?php

namespace App\Domain\Gateways\Github;

interface RetrieveNominatimLocationInfoGateway
{
    public function retrieveLocationInfo(string $location): array;
}

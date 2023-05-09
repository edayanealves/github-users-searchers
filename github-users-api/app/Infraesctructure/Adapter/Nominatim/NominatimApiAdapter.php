<?php

namespace App\Infraesctructure\Adapter\Nominatim;

use App\Domain\Gateways\Github\RetrieveNominatimLocationInfoGateway;
use Illuminate\Support\Facades\Http;

class NominatimApiAdapter implements RetrieveNominatimLocationInfoGateway
{
    private string $nominatimUrl;

    /**
     * @param string $nominatimUrl
     */
    public function __construct()
    {
        $protocol = config('config.api.nominatim.protocol');
        $host = config('config.api.nominatim.host');
        $this->nominatimUrl = "$protocol://$host";
    }


    public function retrieveLocationInfo(string $location): array
    {
        $uri = $this->nominatimUrl . '/search?format=json&q=' . $location;
        $response = Http::get($uri);

        return $response->json();
    }
}

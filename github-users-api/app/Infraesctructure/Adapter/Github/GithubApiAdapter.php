<?php

namespace App\Infraesctructure\Adapter\Github;

use App\Domain\Gateways\Github\RetrieveGithubUserGateway;
use Illuminate\Support\Facades\Http;

class GithubApiAdapter implements RetrieveGithubUserGateway
{
    private string $githubUrl;

    /**
     */
    public function __construct()
    {
        $protocol = config('config.api.github.protocol');
        $host = config('config.api.github.host');
        $this->githubUrl = "$protocol://$host";
    }


    public function getGithubUserByUsernameGateway(string $username): array
    {
        $uri = $this->githubUrl . '/users/' . $username;

        $response = Http::get($uri);

        return $response->json();
    }
}


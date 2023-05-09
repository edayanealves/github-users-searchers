<?php

namespace App\Services;

use App\Data\UseCases\FindGithubUserByUsernameUseCaseImpl;
use App\Domain\UseCases\CreateGithubUserUseCase;
use App\Domain\UseCases\DeleteGithubUserUseCase;
use App\Domain\UseCases\FindGithubUserByUsernameUseCase;
use App\Domain\UseCases\RetrieveGithubUserByUsernameUseCase;
use App\Domain\UseCases\RetrieveGithubUsersByAuthenticatedUserUseCase;
use App\Domain\UseCases\RetrieveNominatimLocationInfoUseCase;
use App\Domain\UseCases\UpdateGithubUserUseCase;
use App\Models\GithubUser;
use Illuminate\Support\Collection;

class GithubService
{


    public function __construct(
        protected RetrieveGithubUserByUsernameUseCase $retrieveGithubUserByUsernameUseCase,
        protected CreateGithubUserUseCase $createGithubUserUseCase,
        protected RetrieveNominatimLocationInfoUseCase $retrieveNominatimLocationInfoUseCase,
        protected RetrieveGithubUsersByAuthenticatedUserUseCase $retrieveGithubUsersByAuthenticatedUserUseCase,
        protected DeleteGithubUserUseCase $deleteGithubUserUseCase,
        protected UpdateGithubUserUseCase $updateGithubUserUseCase,
        protected FindGithubUserByUsernameUseCase $findGithubUserByUsernameUseCase,

    )
    {
    }

    public function handleSearchByUsername(string $username): array
    {
        $githubUser = $this->retrieveGithubUserByUsernameUseCase->handle($username);
        $githubUserFormatted = array_intersect_key($githubUser, array_flip([
            'login',
            'avatar_url',
            'html_url',
            'type',
            'site_admin',
            'name',
            'company',
            'location',
            'email',
            'bio',
            'public_repos',
            'followers',
            'following',
        ]));

        if($githubUserFormatted['location'] != null){
            $this->retrieveLocationData($githubUserFormatted);
        }

        return $githubUserFormatted;
    }

    private function retrieveLocationData(&$githubUser): void {
        if($githubUser['location'] == null) {
            return;
        }
        $locationInfo = $this->retrieveNominatimLocationInfoUseCase->handle($githubUser['location']);
        if(sizeof($locationInfo) < 1) {
            return;
        }

        $githubUser['location_lat'] = $locationInfo[0]['lat'];
        $githubUser['location_long'] = $locationInfo[0]['lon'];
    }
    public function handleCreation(array $data): GithubUser {
        $data['user_id'] = auth()->user()->id;
        $this->retrieveLocationData($data);
        $userExists = $this->findGithubUserByUsernameUseCase->handle($data['login'], auth()->user()->id);
        if(!is_null($userExists)) {
            return $this->updateGithubUserUseCase->handle($userExists->id, $data);
        }

        return $this->createGithubUserUseCase->handle($data);
    }

    public function handleSavedGithubUsers(): Collection {
        $userId = auth()->user()->id;

        return $this->retrieveGithubUsersByAuthenticatedUserUseCase->handle($userId);
    }

    public function handleDeleteGithubUser(int $githubUserId): void {
        $userId = auth()->user()->id;

        $this->deleteGithubUserUseCase->handle($githubUserId, $userId);
    }
    public function handleUpdateGithubUser(int $githubUserId, $data): GithubUser {

        $this->retrieveLocationData($data);
        return $this->updateGithubUserUseCase->handle($githubUserId, $data);
    }
}

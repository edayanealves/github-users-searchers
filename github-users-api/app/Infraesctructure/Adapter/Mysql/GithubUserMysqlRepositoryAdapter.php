<?php

namespace App\Infraesctructure\Adapter\Mysql;

use App\Data\Contracts\Repositories\CreateGithubUserRepository;
use App\Data\Contracts\Repositories\DeleteGithubUserRepository;
use App\Data\Contracts\Repositories\FindGithubUserByUsernameRepository;
use App\Data\Contracts\Repositories\RetrieveSavedGithubUsersByAuthenticatedUserRepository;
use App\Data\Contracts\Repositories\UpdateGithubUserRepository;
use App\Models\GithubUser;
use Illuminate\Support\Collection;

class GithubUserMysqlRepositoryAdapter implements
    CreateGithubUserRepository,
    RetrieveSavedGithubUsersByAuthenticatedUserRepository,
    DeleteGithubUserRepository,
    UpdateGithubUserRepository,
    FindGithubUserByUsernameRepository
{


    public function __construct(
        protected GithubUser $model
    )
    {
    }

    public function createGithubUser(array $data)
    {
        return $this->model->updateOrCreate($data);
    }

    public function retrieveGithubUsers(int $userId): Collection
    {
        return $this->model->where('user_id', $userId)->get();
    }


    public function deleteGithubUser(int $githubUserId, int $userID): void
    {
        $this->model->where('user_id', $userID)->where('id', $githubUserId)->delete();
    }

    public function updateGithubUser($id, $data): ?GithubUser
    {
        $user = $this->model->where('id', $id)->first();
        $user->update($data);
        return $user;
    }
    public function findGithubUserByUsername(string $username, int $userId): ?GithubUser
    {
        return $this->model
            ->where('login', $username)
            ->where('user_id', $userId)
            ->first();
    }

}

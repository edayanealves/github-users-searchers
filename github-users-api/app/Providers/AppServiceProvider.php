<?php

namespace App\Providers;

use App\Data\Contracts\Repositories\CreateGithubUserRepository;
use App\Data\Contracts\Repositories\CreateUserRepository;
use App\Data\Contracts\Repositories\DeleteGithubUserRepository;
use App\Data\Contracts\Repositories\FindGithubUserByUsernameRepository;
use App\Data\Contracts\Repositories\RetrieveSavedGithubUsersByAuthenticatedUserRepository;
use App\Data\Contracts\Repositories\UpdateGithubUserRepository;
use App\Data\UseCases\AuthenticateUserAndReturnTokenUseCaseImpl;
use App\Data\UseCases\CreateGithubUserUseCaseImpl;
use App\Data\UseCases\CreateUserUseCaseImpl;
use App\Data\UseCases\DeleteGithubUserUseCaseImpl;
use App\Data\UseCases\FindGithubUserByUsernameUseCaseImpl;
use App\Data\UseCases\RetrieveGithubUserByUsernameUseCaseImpl;
use App\Data\UseCases\RetrieveGithubUsersByAuthenticatedUserUseCaseImpl;
use App\Data\UseCases\RetrieveNominatimLocationInfoUseCaseImpl;
use App\Data\UseCases\UpdateGithubUserUseCaseImpl;
use App\Domain\Gateways\Github\RetrieveGithubUserGateway;
use App\Domain\Gateways\Github\RetrieveNominatimLocationInfoGateway;
use App\Domain\UseCases\AuthenticateUserAndReturnTokenUseCase;
use App\Domain\UseCases\CreateGithubUserUseCase;
use App\Domain\UseCases\CreateUserUseCase;
use App\Domain\UseCases\DeleteGithubUserUseCase;
use App\Domain\UseCases\FindGithubUserByUsernameUseCase;
use App\Domain\UseCases\RetrieveGithubUserByUsernameUseCase;
use App\Domain\UseCases\RetrieveGithubUsersByAuthenticatedUserUseCase;
use App\Domain\UseCases\RetrieveNominatimLocationInfoUseCase;
use App\Domain\UseCases\UpdateGithubUserUseCase;
use App\Infraesctructure\Adapter\Github\GithubApiAdapter;
use App\Infraesctructure\Adapter\Mysql\GithubUserMysqlRepositoryAdapter;
use App\Infraesctructure\Adapter\Mysql\UserMysqlRepositoryAdapter;
use App\Infraesctructure\Adapter\Nominatim\NominatimApiAdapter;
use App\Services\AuthService;
use App\Services\GithubService;
use App\Services\UserService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CreateUserRepository::class, UserMysqlRepositoryAdapter::class);
        $this->app->bind(CreateUserUseCase::class, CreateUserUseCaseImpl::class);
        $this->app->bind(UserService::class, function (Application $app){
            return new UserService($app->make(CreateUserUseCase::class));
        });

        $this->app->bind(AuthenticateUserAndReturnTokenUseCase::class, AuthenticateUserAndReturnTokenUseCaseImpl::class);
        $this->app->bind(AuthService::class, function (Application $app){
            return new AuthService($app->make(AuthenticateUserAndReturnTokenUseCase::class));
        });


        $this->app->bind(RetrieveNominatimLocationInfoGateway::class, NominatimApiAdapter::class);
        $this->app->bind(RetrieveNominatimLocationInfoUseCase::class, RetrieveNominatimLocationInfoUseCaseImpl::class);

        $this->app->bind(RetrieveGithubUserGateway::class, GithubApiAdapter::class);
        $this->app->bind(RetrieveGithubUserByUsernameUseCase::class, RetrieveGithubUserByUsernameUseCaseImpl::class);
        $this->app->bind(CreateGithubUserRepository::class, GithubUserMysqlRepositoryAdapter::class);
        $this->app->bind(CreateGithubUserUseCase::class, CreateGithubUserUseCaseImpl::class);

        $this->app->bind(RetrieveSavedGithubUsersByAuthenticatedUserRepository::class, GithubUserMysqlRepositoryAdapter::class);
        $this->app->bind(RetrieveGithubUsersByAuthenticatedUserUseCase::class, RetrieveGithubUsersByAuthenticatedUserUseCaseImpl::class);
        $this->app->bind(DeleteGithubUserRepository::class, GithubUserMysqlRepositoryAdapter::class);
        $this->app->bind(DeleteGithubUserUseCase::class, DeleteGithubUserUseCaseImpl::class);
        $this->app->bind(UpdateGithubUserRepository::class, GithubUserMysqlRepositoryAdapter::class);
        $this->app->bind(UpdateGithubUserUseCase::class, UpdateGithubUserUseCaseImpl::class);

        $this->app->bind(FindGithubUserByUsernameRepository::class, GithubUserMysqlRepositoryAdapter::class);
        $this->app->bind(FindGithubUserByUsernameUseCase::class, FindGithubUserByUsernameUseCaseImpl::class);


        $this->app->bind(GithubService::class, function (Application $app){
            return new GithubService(
                $app->make(RetrieveGithubUserByUsernameUseCase::class),
                $app->make(CreateGithubUserUseCase::class),
                $app->make(RetrieveNominatimLocationInfoUseCase::class),
                $app->make(RetrieveGithubUsersByAuthenticatedUserUseCase::class),
                $app->make(DeleteGithubUserUseCase::class),
                $app->make(UpdateGithubUserUseCase::class),
                $app->make(FindGithubUserByUsernameUseCase::class),
            );
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

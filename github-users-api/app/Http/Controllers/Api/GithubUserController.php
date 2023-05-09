<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGithubUserRequest;
use App\Http\Requests\UpdateGithubUserRequest;
use App\Http\Resources\GithubUserResponseResource;
use App\Services\GithubService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GithubUserController extends Controller
{

    public function __construct(
        protected GithubService $service
    )
    {
        $this->middleware('jwt.auth');
    }

    public function index(): GithubUserResponseResource {
        $response = $this->service->handleSavedGithubUsers();
        return new GithubUserResponseResource($response);
    }

    public function show(string $username): GithubUserResponseResource {
        $response = $this->service->handleSearchByUsername($username);
        return new GithubUserResponseResource($response);
    }

    public function destroy(int $githubUser): \Illuminate\Http\JsonResponse
    {
        $this->service->handleDeleteGithubUser($githubUser);
        return response()->json([], Response::HTTP_OK);
    }
    public function store(StoreGithubUserRequest $request): GithubUserResponseResource {
        $response = $this->service->handleCreation($request->all());
        return new GithubUserResponseResource($response);
    }
    public function update(UpdateGithubUserRequest $request, int $id): GithubUserResponseResource {
        $response = $this->service->handleUpdateGithubUser($id, $request->all());
        return new GithubUserResponseResource($response);
    }
}

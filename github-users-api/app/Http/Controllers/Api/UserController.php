<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service
    ) {

    }

    public function store(StoreUpdateUserRequest $request)
    {
        $data = $request->validated();

        return $this->service->handleUserCreate($data);

    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResponseResource;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    //
    public function __construct(
        protected AuthService $service
    )
    {
    }

    public function store(AuthRequest $request) {
        $response = $this->service->handleAuthentication($request->all());
        return new AuthResponseResource($response);
    }
}

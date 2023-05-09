<?php

use App\Http\Controllers\Api\UserController;
use \App\Http\Controllers\Api\AuthController;
use \App\Http\Controllers\Api\GithubUserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/users', UserController::class);
Route::apiResource('/auth', AuthController::class);
Route::middleware(['jwt.auth'])->apiResource('/github-users', GithubUserController::class);
// Route::delete('/users/{id}', [UserController::class, 'destroy']);
// Route::patch('/users/{id}', [UserController::class, 'update']);
// Route::get('/users/{id}', [UserController::class, 'show']);
// Route::get('/users', [UserController::class, 'index']);
// Route::post('/users', [UserController::class, 'store']);

Route::post('/', function () {
    return response()->json([
        'success' => true
    ]);
});

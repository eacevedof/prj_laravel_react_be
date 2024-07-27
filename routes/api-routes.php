<?php

declare(strict_types=1);

//api-routes.php
use App\Http\Controllers\HealthCheck\GetHealthCheckController;
use App\Modules\Users\CreateUser\Infrastructure\CreateUserController;
use Illuminate\Support\Facades\Route;

Route::get("/health-check", GetHealthCheckController::class);

//users
Route::post("/v1/users/create-user", CreateUserController::class);

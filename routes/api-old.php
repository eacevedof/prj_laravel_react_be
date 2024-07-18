<?php
//api.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthCheck\GetHealthCheckController;

Route::get("/api/health-check", GetHealthCheckController::class);


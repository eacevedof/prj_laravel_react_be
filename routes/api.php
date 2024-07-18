<?php

//api.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthCheck\GetHealthCheckController;

Route::get("/health-check", GetHealthCheckController::class);

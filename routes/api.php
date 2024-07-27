<?php

declare(strict_types=1);

//api.php

use App\Http\Controllers\HealthCheck\GetHealthCheckController;
use Illuminate\Support\Facades\Route;

Route::get("/health-check", GetHealthCheckController::class);

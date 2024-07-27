<?php

declare(strict_types=1);

namespace App\Http\Controllers\HealthCheck;

use Illuminate\Http\JsonResponse;

final class GetHealthCheckController
{
    public function __invoke(): JsonResponse
    {
        return response()->json(["status" => "ok"]);
    }
}

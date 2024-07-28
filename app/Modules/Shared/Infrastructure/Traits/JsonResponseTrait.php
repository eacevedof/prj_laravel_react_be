<?php

declare(strict_types=1);

namespace App\Modules\Shared\Infrastructure\Traits;

use App\Modules\Shared\Infrastructure\Components\HttpJsonResponse;
use Illuminate\Http\JsonResponse;

trait JsonResponseTrait
{
    private function getJsonResponse(
        array $data = [],
        int $status = 200,
        array $headers = [],
    ): JsonResponse {
        return new JsonResponse($data, $status, $headers, 0);
    }

    private function fromJsonResponse(HttpJsonResponse $httpJsonResponse): JsonResponse
    {
        return new JsonResponse(
            $httpJsonResponse->toArray(),
            $httpJsonResponse->code(),
            [],
            0
        );
    }
}

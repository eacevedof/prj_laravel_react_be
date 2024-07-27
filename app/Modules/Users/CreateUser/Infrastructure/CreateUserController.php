<?php

namespace App\Modules\Users\CreateUser\Infrastructure;

use App\Modules\Users\CreateUser\Application\CreateUserDto;
use App\Modules\Users\CreateUser\Application\CreateUserService;
use Illuminate\Http\Request;
use App\Modules\Shared\Infrastructure\Traits\JsonResponseTrait;
use Illuminate\Http\JsonResponse;

final readonly class CreateUserController
{
    use JsonResponseTrait;

    public function __construct(
        private CreateUserService $createUserService
    ) {
    }

    public function __invoke(Request $httpRequest): JsonResponse
    {
        $createUserDto = CreateUserDto::fromPrimitives($httpRequest->all());
        $this->createUserService->__invoke($createUserDto);
        return $this->getJsonResponse([], 201);
    }
}

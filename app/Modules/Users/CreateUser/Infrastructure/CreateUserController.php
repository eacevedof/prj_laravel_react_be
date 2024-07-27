<?php

declare(strict_types=1);

namespace App\Modules\Users\CreateUser\Infrastructure;

use App\Modules\Shared\Infrastructure\Traits\JsonResponseTrait;
use App\Modules\Users\CreateUser\Application\CreateUserDto;
use App\Modules\Users\CreateUser\Application\CreateUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final readonly class CreateUserController
{
    use JsonResponseTrait;

    public function __construct(
        private CreateUserService $createUserService
    ) {
    }

    public function __invoke(Request $httpRequest): JsonResponse
    {
        //dd("hola");
        $createUserDto = CreateUserDto::fromHttpRequest($httpRequest);
        $this->createUserService->__invoke($createUserDto);
        return $this->getJsonResponse([], 201);
    }
}

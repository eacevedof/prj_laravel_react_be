<?php

namespace App\Modules\Users\CreateUser\Infrastructure;

use App\Modules\Users\CreateUser\Application\CreateUserDto;
use App\Modules\Users\CreateUser\Application\CreateUserService;
use Illuminate\Http\Request;

final readonly class CreateUserController
{
    public function __construct(
        private CreateUserService $createUserService
    ) {
    }

    public function __invoke(Request $httpRequest): void
    {
        $createUserDto = CreateUserDto::fromPrimitives($httpRequest->all());
        $this->createUserService->__invoke($createUserDto);
    }
}

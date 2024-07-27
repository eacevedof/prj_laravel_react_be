<?php

declare(strict_types=1);

namespace App\Modules\Users\CreateUser\Application;

final class CreateUserService
{
    public function __invoke(
        CreateUserDto $createUserDto
    ): CreatedUserDto {
        return CreatedUserDto::fromPrimitives([]);
    }
}

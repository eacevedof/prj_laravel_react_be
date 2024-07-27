<?php

declare(strict_types=1);

namespace App\Modules\Users\CreateUser\Application;

final readonly class CreatedUserDto
{
    public function __construct(array $primitives)
    {

    }

    public function fromPrimitives(array $primitives): self
    {
        return new self($primitives);
    }
}

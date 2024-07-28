<?php

declare(strict_types=1);

namespace App\Modules\Users\Application\CreateUser;

final readonly class CreatedUserDto
{
    public function __construct(array $primitives)
    {

    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self($primitives);
    }
}

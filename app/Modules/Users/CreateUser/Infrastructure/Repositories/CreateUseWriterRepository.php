<?php

declare(strict_types=1);

namespace App\Modules\Users\CreateUser\Infrastructure\Repositories;

use App\Modules\Shared\Infrastructure\Repositories\AbstractRepository;
use App\Modules\Users\CreateUser\Domain\Entities\UserEntity;

final class CreateUseWriterRepository extends AbstractRepository
{
    public function createUser(UserEntity $userEntity): void
    {
        $this->command("users")->insert([
            "name" => $userEntity->getName(),
            "email" => $userEntity->getEmail(),
            "password" => $userEntity->getPassword(),
            "created_at" => now(),
        ]);
    }
}

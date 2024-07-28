<?php

declare(strict_types=1);

namespace App\Modules\Users\Infrastructure\Repositories;

use App\Modules\Shared\Infrastructure\Repositories\AbstractRepository;
use App\Modules\Users\Domain\Entities\UserEntity;

final class CreateUseWriterRepository extends AbstractRepository
{
    private UserEntity $userEntity;
    public function createUser(UserEntity $userEntity): void
    {
        $this->userEntity = $userEntity;

        $this->createSysUser();
        $this->createAppUserByUserId();
    }

    private function createSysUser(): void
    {

        $this->lastId = $this->command("sys_user")->insertGetId([
            "created_platform" => $this->userEntity->createdPlatform(),
            "created_by" => $this->userEntity->createdBy(),
            "created_at" => $this->getDatetimeNow(),

            "uuid" => $this->userEntity->uuid(),
            "username" => $this->userEntity->username(),
            "email" => $this->userEntity->email(),
            "password" => $this->userEntity->password(),

        ]);
    }

    private function createAppUserByUserId(): void
    {

    }
}

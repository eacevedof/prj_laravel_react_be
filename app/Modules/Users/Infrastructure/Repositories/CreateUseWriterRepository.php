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
            "user_id" => $this->userEntity->getUserId(),
            "username" => $this->->getUsername(),
            "password" => $sysUserEntity->getPassword(),
            "created_at" => now(),
        ]);
    }

    private function createAppUserByUserId(): void
    {

    }
}

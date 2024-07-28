<?php

declare(strict_types=1);

namespace App\Modules\Users\Infrastructure\Repositories;

use App\Modules\Shared\Infrastructure\Repositories\AbstractRepository;
use App\Modules\Users\Domain\Entities\UserEntity;
use App\Modules\Users\Domain\Exceptions\CreateUserException;

final class CreateUseWriterRepository extends AbstractRepository
{
    private const SYS_USER_TABLE = "sys_user";
    private const APP_USER_TABLE = "app_user";
    private UserEntity $userEntity;
    public function createUser(UserEntity $userEntity): void
    {
        $this->userEntity = $userEntity;

        $this->createSysUserOrFail();
        $this->createAppUserByUserId();
    }

    private function createSysUserOrFail(): void
    {
        //$passwordHashed = Hasher::getHashByString($this->userEntity->secretPwd());
        $this->lastId = $this->command(self::SYS_USER_TABLE)->insertGetId([
            "created_platform" => $this->userEntity->createdPlatform(),
            "created_by" => $this->userEntity->createdBy(),
            "created_at" => $this->getDatetimeNow(),

            "uuid" => $this->userEntity->uuid(),
            "username" => $this->userEntity->username(),
            "email" => $this->userEntity->email(),
            "secret_pwd" => $this->userEntity->secretPwd(),
        ]);
        if (!$this->lastId) {
            CreateUserException::sysUserNotCreated($this->userEntity->username());
        }
    }

    private function createAppUserByUserId(): void
    {
        $this->command(self::APP_USER_TABLE)->insert([
            "sys_user_id" => $this->lastId,
            "first_name" => $this->userEntity->firstName(),
            "first_surname" => $this->userEntity->firstSurname(),
            "mobile_number" => $this->userEntity->mobileNumber()
        ]);
    }
}

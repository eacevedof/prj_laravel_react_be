<?php

declare(strict_types=1);

namespace App\Modules\Users\Application\CreateUser;

use App\Modules\Shared\Domain\Enums\UuidPrefixEnum;
use App\Modules\Shared\Infrastructure\Components\Hasher;
use App\Modules\Shared\Infrastructure\Components\Uuid;
use App\Modules\Users\Domain\Entities\UserEntity;
use App\Modules\Users\Domain\Enums\UserEnabledEnum;
use App\Modules\Users\Domain\Exceptions\CreateUserException;
use App\Modules\Users\Infrastructure\Repositories\CreateUseWriterRepository;
use App\Modules\Users\Infrastructure\Repositories\SysUserReaderRepository;

final readonly class CreateUserService
{
    private CreateUserDto $createUserDto;
    public function __construct(
        private SysUserReaderRepository $sysUserReaderRepository,
        private CreateUseWriterRepository $createUseWriterRepository
    ) {
    }

    public function __invoke(
        CreateUserDto $createUserDto
    ): CreatedUserDto {
        $this->createUserDto = $createUserDto;
        $this->failIfWrongDto();

        return CreatedUserDto::fromPrimitives([]);
    }

    private function failIfWrongDto(): void
    {
        if ($this->sysUserReaderRepository->getUserIdByUsername($this->createUserDto->email())) {
            CreateUserException::userAlreadyExistsByEmail($this->createUserDto->email());
        }
    }

    private function createUser(): void
    {
        $userEntity = UserEntity::fromPrimitives([
            "createdPlatform" => $this->createUserDto->createdPlatform(),
            "createdBy" => $this->createUserDto->createdBy(),
            "createdAt" => null,

            "isEnabled" => UserEnabledEnum::DISABLED->value,
            "uuid" => Uuid::getUuidWithPrefix(UuidPrefixEnum::USER->value),
            "username" => $this->createUserDto->email(),
            "secretPwd" => Hasher::getHashByString($this->createUserDto->secretPwd()),

            "email" => $this->createUserDto->email(),

            "firstName" => $this->createUserDto->firstName(),
            "firstSurname" => $this->createUserDto->firstSurname(),
        ]);
        $this->createUseWriterRepository->createUser($userEntity);
    }
}

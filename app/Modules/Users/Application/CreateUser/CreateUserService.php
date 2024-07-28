<?php

declare(strict_types=1);

namespace App\Modules\Users\Application\CreateUser;

use App\Modules\Shared\Domain\Enums\UuidPrefixEnum;
use App\Modules\Shared\Infrastructure\Components\Hasher;
use App\Modules\Shared\Infrastructure\Components\Time;
use App\Modules\Shared\Infrastructure\Components\Uuid;
use App\Modules\Users\Domain\Entities\UserEntity;
use App\Modules\Users\Domain\Enums\UserEnabledEnum;
use App\Modules\Users\Domain\Exceptions\CreateUserException;
use App\Modules\Users\Infrastructure\Repositories\CreateUseWriterRepository;
use App\Modules\Users\Infrastructure\Repositories\SysUserReaderRepository;

final readonly class CreateUserService
{
    private string $userUuid;
    private CreateUserDto $createUserDto;
    public function __construct(
        private SysUserReaderRepository $sysUserReaderRepository,
        private CreateUseWriterRepository $createUseWriterRepository
    ) {
    }

    public function __invoke(CreateUserDto $createUserDto): CreatedUserDto
    {
        $this->createUserDto = $createUserDto;

        $this->failIfWrongDto();
        $this->createUserOrFail();

        return $this->getCreatedUserDto();
    }

    private function failIfWrongDto(): void
    {
        if (!$email = $this->createUserDto->email()) {
            CreateUserException::emptyEmail();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            CreateUserException::invalidEmail($email);
        }

        if ($this->sysUserReaderRepository->getUserIdByUsername($this->createUserDto->email())) {
            CreateUserException::userAlreadyExistsByEmail($this->createUserDto->email());
        }

        if (!$this->createUserDto->secretPwd()) {
            CreateUserException::emptySecretPwd();
        }

        if (!$this->createUserDto->firstName()) {
            CreateUserException::emptyFirstName();
        }

    }

    private function createUserOrFail(): void
    {
        $this->userUuid = Uuid::getUuidWithPrefix(UuidPrefixEnum::USER->value);
        $userEntity = UserEntity::fromPrimitives([
            "createdPlatform" => $this->createUserDto->createdPlatform(),
            "createdBy" => $this->createUserDto->createdBy(),
            "createdAt" => Time::now(),

            "isEnabled" => UserEnabledEnum::DISABLED->value,
            "uuid" => $this->userUuid,
            "username" => $this->createUserDto->email(),
            "secretPwd" => Hasher::getHashByString($this->createUserDto->secretPwd()),

            "email" => $this->createUserDto->email(),

            "firstName" => $this->createUserDto->firstName(),
            "firstSurname" => $this->createUserDto->firstSurname(),
        ]);
        $this->createUseWriterRepository->createUser($userEntity);
    }

    private function getCreatedUserDto(): CreatedUserDto
    {
        $userEntity = $this->sysUserReaderRepository->getUserByUserUuid(
            $this->userUuid
        );
        return CreatedUserDto::fromPrimitives([
            "uuid" => $userEntity->uuid,
            "createdAt" => $userEntity->created_at,
            "createdBy" => $userEntity->created_by,
            "username" => $userEntity->username,
            "isEnabled" => $userEntity->is_enabled,
        ]);
    }
}

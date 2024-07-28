<?php

declare(strict_types=1);

namespace App\Modules\Users\Application\CreateUser;

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
        ]);
        $this->createUseWriterRepository->createUser($userEntity);
    }
}

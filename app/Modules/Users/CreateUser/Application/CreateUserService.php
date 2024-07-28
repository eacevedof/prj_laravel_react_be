<?php

declare(strict_types=1);

namespace App\Modules\Users\CreateUser\Application;

use App\Modules\Users\CreateUser\Infrastructure\Repositories\SysUserReaderRepository;

final readonly class CreateUserService
{
    private CreatedUserDto $createdUserDto;
    public function __construct(
        private SysUserReaderRepository $sysUserReaderRepository,
        private CreateUseWriterRepository $createUseWriterRepository
    ) {

    }

    public function __invoke(
        CreateUserDto $createUserDto
    ): CreatedUserDto {
        $this->createdUserDto = $createUserDto;
        $this->failIfWrongDto();
        return CreatedUserDto::fromPrimitives([]);
    }

    private function failIfWrongDto(): void
    {


        if ($this->sysUserReaderRepository->existsByEmail($this->createdUserDto->email())) {
            throw CreateUserException::userAlreadyExistsByEmail($this->createdUserDto->email());
        }
    }
}

<?php

declare(strict_types=1);

namespace App\Modules\Users\Application\CreateUser;

use App\Modules\Users\CreateUser\Application\CreateUserException;
use App\Modules\Users\CreateUser\Application\CreateUseWriterRepository;
use App\Modules\Users\Infrastructure\Repositories\SysUserReaderRepository;

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
            CreateUserException::userAlreadyExistsByEmail($this->createdUserDto->email());
        }
    }
}

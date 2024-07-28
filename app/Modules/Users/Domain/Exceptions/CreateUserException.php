<?php

declare(strict_types=1);

namespace App\Modules\Users\Domain\Exceptions;

use App\Modules\Shared\Domain\Enums\HttpResponseCodeEnum;
use App\Modules\Shared\Domain\Exceptions\AbstractDomainException;

final class CreateUserException extends AbstractDomainException
{
    public static function userAlreadyExistsByEmail(string $email): self
    {
        throw new self(
            __("users-tr.user-already-exists", ["email" => $email]),
            HttpResponseCodeEnum::BAD_REQUEST->value
        );
    }

    public static function sysUserNotCreated(string $username): self
    {
        throw new self(
            __("users-tr.sys-user-not-created", ["username" => $username]),
            HttpResponseCodeEnum::INTERNAL_SERVER_ERROR->value
        );
    }

}

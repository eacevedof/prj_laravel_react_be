<?php

namespace App\Modules\Users\CreateUser\Application;

final readonly class CreateUserDto
{
    public ?string $createdPlatform;
    public ?string $createdBy;
    public ?\string $createdAt;

    public bool $isEnabled;
    public int $id;
    public string $uuid;
    public string $username;
    public string $secretPwd;
    public ?string $secretPwdReset;
    public ?\string $verifiedAt;
    public int $sysUserId;
    public ?string $email;
    public ?string $firstName;
    public ?string $firstSurname;
    public ?string $mobileNumber;
    public ?string $middleName;
    public ?string $secondSurname;

}

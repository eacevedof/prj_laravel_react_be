<?php

namespace App\Modules\Users\CreateUser\Application;

use App\Modules\Shared\Domain\Enums\PlatformEnum;

final readonly class CreateUserDto
{
    private string $createdPlatform;
    private string $createdBy;
    private string $createdAt;
    private string $username;
    private string $secretPwd;
    private string $secretPwdRepeat;
    private string $email;
    private string $firstName;
    private string $firstSurname;

    public function __construct(array $primitives)
    {
        $this->createdPlatform = trim((string) ($primitives['createdPlatform'] ?? PlatformEnum::UNKNOWN));
        $this->createdBy = trim((string) ($primitives['createdBy'] ?? ""));
        $this->createdAt = trim((string) ($primitives['createdAt'] ?? ""));
        $this->username = trim((string) ($primitives['username'] ?? ""));
        $this->secretPwd = trim((string) ($primitives['secretPwd'] ?? ""));
        $this->secretPwdRepeat = trim((string) ($primitives['secretPwdRepeat'] ?? ""));
        $this->email = trim((string) ($primitives['email'] ?? ""));
        $this->firstName = trim((string) ($primitives['firstName'] ?? ""));
        $this->firstSurname = trim((string) ($primitives['firstSurname'] ?? ""));
    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self($primitives);
    }

    public function createdPlatform(): string
    {
        return $this->createdPlatform;
    }

    public function createdBy(): string
    {
        return $this->createdBy;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function secretPwd(): string
    {
        return $this->secretPwd;
    }

    public function secretPwdRepeat(): string
    {
        return $this->secretPwdRepeat;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function firstSurname(): string
    {
        return $this->firstSurname;
    }

}

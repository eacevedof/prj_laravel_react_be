<?php

declare(strict_types=1);

namespace App\Modules\Users\Domain\Entities;

use App\Modules\Shared\Domain\Aggregate\AbstractAggregateRoot;

final class UserEntity extends AbstractAggregateRoot
{
    public function __construct(
        private string $createdPlatform,
        private string $createdBy,
        private ?string $createdAt,
        private string $updatedPlatform,
        private string $updatedBy,
        private ?string $updatedAt,
        private string $deletedPlatform,
        private string $deletedBy,
        private ?string $deletedAt,
        private int $isEnabled,
        private readonly ?int $id,
        private readonly ?string $uuid,
        private string $username,
        private string $secretPwd,
        private string $secretPwdReset,
        private string $email,
        private string $verifiedAt,
        private string $firstName,
        private string $firstSurname,
        private string $mobileNumber,
        private string $middleName,
        private string $secondSurname
    ) {
    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self(
            $primitives["createdPlatform"] ?? "",
            $primitives["createdBy"] ?? "",
            $primitives["createdAt"] ?? null,
            $primitives["updatedPlatform"] ?? "",
            $primitives["updatedBy"] ?? "",
            $primitives["updatedAt"] ?? null,
            $primitives["deletedPlatform"] ?? "",
            $primitives["deletedBy"] ?? "",
            $primitives["deletedAt"] ?? null,
            $primitives["isEnabled"] ?? 0,
            $primitives["id"] ?? 0,
            $primitives["uuid"] ?? null,
            $primitives["username"] ?? "",
            $primitives["secretPwd"] ?? "",
            $primitives["secretPwdReset"] ?? "",
            $primitives["email"] ?? "",
            $primitives["verifiedAt"] ?? "",
            $primitives["firstName"] ?? "",
            $primitives["firstSurname"] ?? "",
            $primitives["mobileNumber"] ?? "",
            $primitives["middleName"] ?? "",
            $primitives["secondSurname"] ?? ""
        );
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

    public function updatedPlatform(): string
    {
        return $this->updatedPlatform;
    }

    public function updatedBy(): string
    {
        return $this->updatedBy;
    }

    public function updatedAt(): string
    {
        return $this->updatedAt;
    }

    public function deletedPlatform(): string
    {
        return $this->deletedPlatform;
    }

    public function deletedBy(): string
    {
        return $this->deletedBy;
    }

    public function deletedAt(): string
    {
        return $this->deletedAt;
    }

    public function isEnabled(): int
    {
        return $this->isEnabled;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function secretPwd(): string
    {
        return $this->secretPwd;
    }

    public function secretPwdReset(): string
    {
        return $this->secretPwdReset;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function verifiedAt(): string
    {
        return $this->verifiedAt;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function firstSurname(): string
    {
        return $this->firstSurname;
    }

    public function mobileNumber(): string
    {
        return $this->mobileNumber;
    }

    public function middleName(): string
    {
        return $this->middleName;
    }

    public function secondSurname(): string
    {
        return $this->secondSurname;
    }

}

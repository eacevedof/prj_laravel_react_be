<?php

declare(strict_types=1);

namespace App\Modules\Users\Application\CreateUser;

final readonly class CreatedUserDto
{
    private string $uuid;
    private string $createdAt;
    private string $createdBy;
    private string $username;
    private int $isEnabled;

    public function __construct(array $primitives)
    {
        $this->uuid = trim((string)($primitives["uuid"] ?? ""));
        $this->createdAt = trim((string)($primitives["createdAt"] ?? ""));
        $this->createdBy = trim((string)($primitives["createdBy"] ?? ""));
        $this->username = trim((string)($primitives["username"] ?? ""));
        $this->isEnabled = (int)($primitives["isEnabled"] ?? null);
    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self($primitives);
    }

    public function toArray(): array
    {
        return [
            "uuid" => $this->uuid,
            "createdAt" => $this->createdAt,
            "createdBy" => $this->createdBy,
            "username" => $this->username,
            "isEnabled" => $this->isEnabled,
        ];
    }
}

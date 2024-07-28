<?php

declare(strict_types=1);

namespace App\Modules\Users\Application\CreateUser;

use App\Modules\Shared\Domain\Enums\PlatformEnum;
use Illuminate\Http\Request;

final readonly class CreateUserDto
{
    private string $uuid;
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
        $this->uuid = trim((string) ($primitives["uuid"] ?? ""));
        $this->createdPlatform = trim((string) ($primitives["createdPlatform"] ?? PlatformEnum::UNKNOWN->value));
        $this->createdBy = trim((string) ($primitives["createdBy"] ?? ""));
        $this->createdAt = trim((string) ($primitives["createdAt"] ?? ""));
        $this->username = trim((string) ($primitives["username"] ?? ""));
        $this->secretPwd = trim((string) ($primitives["secretPwd"] ?? ""));
        $this->secretPwdRepeat = trim((string) ($primitives["secretPwdRepeat"] ?? ""));
        $this->email = trim((string) ($primitives["email"] ?? ""));
        $this->firstName = trim((string) ($primitives["firstName"] ?? ""));
        $this->firstSurname = trim((string) ($primitives["firstSurname"] ?? ""));
    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self($primitives);
    }

    public static function fromHttpRequest(Request $request): self
    {
        return new self([
            "createdPlatform" => $request->input("createdPlatform"),
            "createdBy" => "1",
            "username" => $request->input("username"),
            "secretPwd" => $request->input("secretPwd"),
            "secretPwdRepeat" => $request->input("secretPwdRepeat"),
            "email" => $request->input("email"),
            "firstName" => $request->input("firstName"),
            "firstSurname" => $request->input("firstSurname"),
        ]);
    }

    public function uuid(): string
    {
        return $this->uuid;
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

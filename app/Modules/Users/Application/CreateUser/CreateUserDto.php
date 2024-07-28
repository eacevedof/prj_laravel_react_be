<?php

declare(strict_types=1);

namespace App\Modules\Users\Application\CreateUser;

use App\Modules\Shared\Domain\Enums\PlatformEnum;
use Illuminate\Http\Request;

final readonly class CreateUserDto
{
    private string $createdPlatform;
    private string $createdBy;
    private string $secretPwd;
    private string $secretPwdRepeat;
    private string $email;
    private string $firstName;
    private string $firstSurname;

    public function __construct(array $primitives)
    {
        $this->createdPlatform = trim((string) ($primitives["createdPlatform"] ?? PlatformEnum::UNKNOWN->value));
        $this->createdBy = trim((string) ($primitives["createdBy"] ?? ""));
        $this->secretPwd = trim((string) ($primitives["secretPwd"] ?? ""));
        $this->secretPwdRepeat = trim((string) ($primitives["secretPwdRepeat"] ?? ""));
        $this->email = trim((string) ($primitives["email"] ?? ""));
        $this->firstName = trim((string) ($primitives["firstName"] ?? ""));
        $this->firstSurname = trim((string) ($primitives["firstSurname"] ?? ""));
    }

    public static function fromHttpRequest(Request $httpRequest): self
    {
        return new self([
            "createdPlatform" => (string) PlatformEnum::FRONTEND->value,
            "createdBy" => "1",
            "secretPwd" => $httpRequest->input("password"),
            "secretPwdRepeat" => $httpRequest->input("password_repeat"),
            "email" => $httpRequest->input("email"),
            "firstName" => $httpRequest->input("first_name"),
            "firstSurname" => $httpRequest->input("first_surname"),
        ]);
    }

    public function createdPlatform(): string
    {
        return $this->createdPlatform;
    }

    public function createdBy(): string
    {
        return $this->createdBy;
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

<?php

declare(strict_types=1);

namespace App\Modules\Shared\Infrastructure\Components;

use Illuminate\Http\JsonResponse;

final class HttpJsonResponse
{
    private string $status;
    private string $message;
    private int $code;
    private array $data;

    // Constructor
    public function __construct(array $primitives)
    {
        $this->code = (int)($primitives["code"] ?? 200);
        $this->status = $this->getStatusByCode();
        $this->message = (string)($primitives["message"] ?? "");
        $this->data = $primitives["data"] ?? [];
    }

    public static function fromPrimitives(array $primitives): self
    {
        return new self($primitives);
    }

    public function status(): int
    {
        return $this->status;
    }

    public function message(): string
    {
        return $this->message;
    }

    public function code(): int
    {
        return $this->code;
    }

    public function data()
    {
        return $this->data;
    }

    public function toArray(): array
    {
        return [
            "code" => $this->code,
            "status" => $this->status,
            "message" => $this->message,
            "data" => $this->data
        ];
    }

    public function getAsJson(): string
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }

    public function getAsJsonResponse(): JsonResponse
    {
        return new JsonResponse(
            $this->toArray(),
            $this->code(),
            [],
            0
        );
    }

    private function getStatusByCode(): string
    {
        $responseCode = (string) $this->code;
        $two = "2";
        if (mb_substr($responseCode, 0, mb_strlen($two)) === $two) {
            return "success";
        }
        return "error";
    }
}

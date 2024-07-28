<?php

declare(strict_types=1);

namespace App\Modules\Users\CreateUser\Infrastructure;

use App\Modules\Shared\Infrastructure\Traits\JsonResponseTrait;
use App\Modules\Users\CreateUser\Application\CreateUserDto;
use App\Modules\Users\CreateUser\Application\CreateUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Modules\Users\CreateUser\Domain\Exceptions\CreateUserException;
use \Throwable;
use App\Modules\Shared\Domain\Enums\HttpResponseCodeEnum;

final readonly class CreateUserController
{
    use JsonResponseTrait;

    public function __construct(
        private CreateUserService $createUserService
    ) {
    }

    public function __invoke(Request $httpRequest): JsonResponse
    {
        try {
            $createUserDto = CreateUserDto::fromHttpRequest($httpRequest);
            $this->createUserService->__invoke($createUserDto);
            return $this->getJsonResponse(
                ["message" => __("users-tr.user-successfully-created")],
                HttpResponseCodeEnum::CREATED->value
            );
        }
        catch (CreateUserException $ex) {
            return $this->getJsonResponse(
                ["message" => $ex->getMessage()],
                $ex->getCode()
            );
        }
        catch (Throwable $ex) {
            return $this->getJsonResponse(
                ["message" => $ex->getMessage()],
                $ex->getCode()
            );
        }
    }
}

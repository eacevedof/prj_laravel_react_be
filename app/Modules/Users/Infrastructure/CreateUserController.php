<?php

declare(strict_types=1);

namespace App\Modules\Users\Infrastructure;

use App\Modules\Shared\Domain\Enums\HttpResponseCodeEnum;
use App\Modules\Shared\Infrastructure\Components\HttpJsonResponse;
use App\Modules\Shared\Infrastructure\Traits\JsonResponseTrait;
use App\Modules\Shared\Infrastructure\Traits\LogTrait;
use App\Modules\Users\Application\CreateUser\CreateUserDto;
use App\Modules\Users\Application\CreateUser\CreateUserService;
use App\Modules\Users\Domain\Exceptions\CreateUserException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

final readonly class CreateUserController
{
    use JsonResponseTrait;
    use LogTrait;

    public function __construct(
        private CreateUserService $createUserService
    ) {
    }

    public function __invoke(Request $httpRequest): JsonResponse
    {
        try {
            $createdUserDto = $this->createUserService->__invoke(
                CreateUserDto::fromHttpRequest($httpRequest)
            );
            return HttpJsonResponse::fromPrimitives([
                "code" => HttpResponseCodeEnum::CREATED->value,
                "message" => __("users-tr.user-created-successfully"),
                "data" => $createdUserDto->toArray(),
            ])->getAsJsonResponse();
        }
        catch (CreateUserException $ex) {
            return $this->getJsonResponse(
                ["message" => $ex->getMessage()],
                $ex->getCode()
            );
        }
        catch (Throwable $ex) {
            $this->logException($ex);
            return $this->getJsonResponse(
                ["message" => __("global-tr.some-unexpected-error-occurred")],
                HttpResponseCodeEnum::INTERNAL_SERVER_ERROR->value
            );
        }
    }
}

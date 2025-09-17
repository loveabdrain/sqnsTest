<?php

namespace Src\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Src\Domain\Users\Actions\LoginAction;
use Src\Domain\Users\Actions\RegisterAction;
use Src\Domain\Users\DTO\Commands\RegisterUserCommand;
use Src\Domain\Users\DTO\Commands\LoginCommand;
use Src\Domain\Users\DTO\Data\RegisterUserData;
use Src\Domain\Users\DTO\Data\UserData;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    public function register(RegisterAction $action, RegisterUserCommand $command)
    {
        try {
            $command = RegisterUserData::validateAndCreate($command->toArray());
            return new JsonResponse($action($command), 200);
        }
        catch (ValidationException $exception) {
            return new JsonResponse($exception->errors(), 422);
        }
    }

    public function login(LoginAction $action, LoginCommand $command)
    {
        return new JsonResponse($action($command), Response::HTTP_OK);
    }

    public function me()
    {
        if ($user = auth('api')->user()) {
            return new JsonResponse(UserData::from($user), 200);
        }
        return new JsonResponse('Unauthorized', 403);
    }
}

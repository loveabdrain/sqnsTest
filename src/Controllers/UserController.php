<?php

namespace Src\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Src\Domain\Users\Actions\ForgotPasswordAction;
use Src\Domain\Users\Actions\GetUserAction;
use Src\Domain\Users\Actions\ResetPasswordAction;
use Src\Domain\Users\Actions\UpdateUserAction;
use Src\Domain\Users\Actions\UploadPhotoUserAction;
use Src\Domain\Users\DTO\Commands\ForgotPasswordCommand;
use Src\Domain\Users\DTO\Commands\ResetPasswordCommand;
use Src\Domain\Users\DTO\Commands\UpdateUserCommand;
use Src\Domain\Users\DTO\Commands\UploadPhotoCommand;
use Src\Domain\Users\DTO\Data\ForgotPasswordData;
use Src\Domain\Users\DTO\Data\ResetPasswordData;
use Src\Domain\Users\DTO\Data\UpdateUserData;
use Src\Domain\Users\Models\User;

class UserController extends Controller
{

    public function getById(GetUserAction $action, User $user)
    {
        return new JsonResponse($action($user), 200);
    }

    public function update(UpdateUserAction $action, UpdateUserCommand $command)
    {
        try {
            $command = UpdateUserData::validateAndCreate(array_filter($command->toArray()));
            $result = $action($command);
            return new JsonResponse($result['message'], $result['code']);
        }
        catch (ValidationException $exception) {
            return new JsonResponse($exception->errors(), 422);
        }
    }

    public function upload(UploadPhotoUserAction $action, UploadPhotoCommand $command)
    {
        return new JsonResponse($action($command), 200);
    }

    public function logout()
    {
        auth('api')->logout();
        return new JsonResponse(status: 200);
    }

    public function forgotPassword(ForgotPasswordAction $action, ForgotPasswordCommand $command)
    {
        try {
            $command = ForgotPasswordData::validateAndCreate(array_filter($command->toArray()));
            $action($command);
            return new JsonResponse(status: 200);
        }
        catch (ValidationException $exception) {
            return new JsonResponse($exception->errors(), 422);
        }
    }

    public function resetPassword(ResetPasswordAction $action, ResetPasswordCommand $command)
    {
        try {
            $command = ResetPasswordData::validateAndCreate(array_filter($command->toArray()));
            $action($command);
            return new JsonResponse(status: 200);
        }
        catch (ValidationException $exception) {
            return new JsonResponse($exception->errors(), 422);
        }
    }

}

<?php

namespace Src\Domain\Users\Actions;

use Illuminate\Support\Facades\Hash;
use Src\Domain\Users\DTO\Data\UpdateUserData;
use Src\Domain\Users\Models\User;

class UpdateUserAction
{

    public function __invoke(UpdateUserData $command)
    {
        /** @var User $user */
        $user = auth()->user();

        if (Hash::check($command->oldPassword, $user->password)) {
            $user->update(array_filter($command->toArray()));
            return ['message' => 'Succeed', 'code' => 200];
        }
        else {
            return ['message' => [
                'oldPassword' => ['Неверный пароль']
            ], 'code' => 422];
        }
    }
}

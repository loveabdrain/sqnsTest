<?php

namespace Src\Domain\Users\Actions;

use Src\Domain\Users\DTO\Commands\LoginCommand;
use Src\Domain\Users\DTO\Data\UserData;

class LoginAction
{

    public function __invoke(LoginCommand $command)
    {
        if (! $token = auth('api')->attempt($command->toArray())) {
            abort(422, 'Unauthorized');
        }

        return [
            'user' => UserData::from(auth()->user()),
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}

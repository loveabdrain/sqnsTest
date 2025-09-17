<?php

namespace Src\Domain\Users\Actions;

use Src\Domain\Users\DTO\Data\RegisterUserData;
use Src\Domain\Users\Models\User;

class RegisterAction
{

    public function __invoke(RegisterUserData $command)
    {
        User::create($command->toArray());
    }
}

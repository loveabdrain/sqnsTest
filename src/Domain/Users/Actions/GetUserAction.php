<?php

namespace Src\Domain\Users\Actions;

use Src\Domain\Users\DTO\Data\UserData;
use Src\Domain\Users\Models\User;

class GetUserAction
{
    public function __invoke(User $user)
    {
        /** @var User $user */
        $user = auth()->user();

        return UserData::from($user);
    }
}

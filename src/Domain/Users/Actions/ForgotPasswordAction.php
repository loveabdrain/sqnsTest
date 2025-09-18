<?php

namespace Src\Domain\Users\Actions;

use Illuminate\Support\Facades\Password;
use Src\Domain\Users\DTO\Data\ForgotPasswordData;

class ForgotPasswordAction
{
    public function __invoke(ForgotPasswordData $command)
    {
        $status = Password::sendResetLink(['email' => $command->email]);

        return $status == Password::RESET_LINK_SENT;
    }

}

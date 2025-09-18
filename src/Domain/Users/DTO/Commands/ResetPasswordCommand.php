<?php

namespace Src\Domain\Users\DTO\Commands;

use Spatie\LaravelData\Data;

class ResetPasswordCommand extends Data
{

    public function __construct(
        public ?string $token,
        public ?string $password,
        public ?string $password_confirmation,
    ){

    }
}

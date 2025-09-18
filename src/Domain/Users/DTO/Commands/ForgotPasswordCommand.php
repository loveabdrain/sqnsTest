<?php

namespace Src\Domain\Users\DTO\Commands;

use Spatie\LaravelData\Data;

class ForgotPasswordCommand extends Data
{

    public function __construct(
        public ?string $email,
    ){

    }
}

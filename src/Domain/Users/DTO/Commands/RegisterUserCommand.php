<?php

namespace Src\Domain\Users\DTO\Commands;

use Spatie\LaravelData\Data;


class RegisterUserCommand extends Data
{

    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $password_confirmation
    ){}

}

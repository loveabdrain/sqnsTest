<?php

namespace Src\Domain\Users\DTO\Commands;

use Spatie\LaravelData\Data;


class LoginCommand extends Data
{

    public function __construct(
        public string $email,
        public string $password
    ){}
}

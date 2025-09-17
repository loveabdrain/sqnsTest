<?php

namespace Src\Domain\Users\DTO\Commands;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;


class UpdateUserCommand extends Data
{

    public function __construct(
        public ?string $name,
        public ?string $email,
        public ?string $oldPassword,
        public ?string $password,
        public ?string $password_confirmation,
    ){

    }
}

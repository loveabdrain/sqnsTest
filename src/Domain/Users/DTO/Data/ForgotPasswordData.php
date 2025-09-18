<?php

namespace Src\Domain\Users\DTO\Data;

use Spatie\LaravelData\Data;


class ForgotPasswordData extends Data
{

    public function __construct(
        public string $email,
    ){}

    public static function rules(): array
    {
        return [
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
            ],
        ];
    }

    public static function messages(): array
    {
        return [
            'email.email' => 'Email должен быть в формате текст@домен',
        ];
    }

}

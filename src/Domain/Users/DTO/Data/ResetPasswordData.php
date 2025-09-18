<?php

namespace Src\Domain\Users\DTO\Data;

use Spatie\LaravelData\Data;


class ResetPasswordData extends Data
{

    public function __construct(
        public string $password,
        public string $password_confirmation,
        public string $token
    ){}

    public static function rules(): array
    {
        return [
            'password' => [
                'required',
                'string',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/',
            ],

            'password_confirmation' => [
                'required',
                'string',
            ],
        ];
    }

    public static function messages(): array
    {
        return [
            'password.regex' => 'Пароль должен содержать: латиницу, буквы верхнего и нижнего регистра, цифры и специальные символы (@$!%*?&)',
            'password.required' => 'Пароль обязателен к заполнению',
            'password.confirmed' => 'Пароли не совпадают',

            'password_confirmation.required' => 'Подтверждение пароля обязателено к заполнению',
        ];
    }

}

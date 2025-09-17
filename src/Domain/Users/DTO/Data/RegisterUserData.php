<?php

namespace Src\Domain\Users\DTO\Data;

use Spatie\LaravelData\Data;


class RegisterUserData extends Data
{

    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $password_confirmation
    ){}

    public static function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],

            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
            ],

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
            'name.required' => 'Имя обязательно для заполнения',
            'name.min' => 'Имя должно содержать минимум 2 символа',

            'email.required' => 'Email обязателен для заполнения',
            'email.email' => 'Email должен быть в формате текст@домен',

            'password.regex' => 'Пароль должен содержать: латиницу, буквы верхнего и нижнего регистра, цифры и специальные символы (@$!%*?&)',
            'password.required' => 'Пароль обязателен к заполнению',
            'password.confirmed' => 'Пароли не совпадают',

            'password_confirmation.required' => 'Подтверждение пароля обязателено к заполнению',
        ];
    }

}

<?php

namespace Src\Domain\Users\DTO\Data;

use Spatie\LaravelData\Data;


class UpdateUserData extends Data
{

    public function __construct(
        public ?string $name,
        public ?string $email,
        public string $oldPassword,
        public ?string $password,
        public ?string $password_confirmation
    ){}

    public static function rules(): array
    {
        return [
            'name' => [
                'string',
                'min:2',
                'max:255',
            ],

            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
            ],

            'oldPassword' => [
                'required',
                'string',
            ],

            'password' => [
                'sometimes',
                'string',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/',
            ],

            'password_confirmation' => [
                'sometimes',
                'string',
            ],
        ];
    }

    public static function messages(): array
    {
        return [
            'name.min' => 'Имя должно содержать минимум 2 символа',

            'email.email' => 'Email должен быть в формате текст@домен',

            'password.regex' => 'Пароль должен содержать: латиницу, буквы верхнего и нижнего регистра, цифры и специальные символы (@$!%*?&)',
            'oldPassword.required' => 'Пароль обязателен к заполнению',
            'password.confirmed' => 'Пароли не совпадают',
        ];
    }

}

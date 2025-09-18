<?php

namespace Src\Domain\Users\Actions;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Hashing\HashManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Src\Domain\Users\DTO\Data\ResetPasswordData;
use Src\Domain\Users\Models\User;

class ResetPasswordAction
{
    public function __invoke(ResetPasswordData $command)
    {
        $data = $command->toArray();
        $rows = DB::table('password_reset_tokens')->get();
        foreach ($rows as $row) {
            if (app(HashManager::class)->check($command->token, $row->token)) {
                $data['email'] = $row->email;
            }
        }
        if (!isset($data['email'])) {
            abort(422, 'Неверный токен');
        }
        $status = "";
        try {
            $status = Password::reset(
                $data,
                function (User $user) use ($command) {
                    $user->forceFill([
                        'password' => $command->password,
                        'remember_token' => Str::random(60),
                    ])->save();

                    event(new PasswordReset($user));
                }
            );
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('SEND_EMAIL_FORGOT_PASSWORD_ERROR', [
                'data' => $data,
                'code' => $e->getCode(),
                'error' => $e->getMessage(),
                'trace' => $e->getTrace(),
            ]);
            abort(500, 'Server Error');
        }

        return $status == Password::PASSWORD_RESET;
    }

}

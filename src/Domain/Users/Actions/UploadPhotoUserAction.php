<?php

namespace Src\Domain\Users\Actions;

use Illuminate\Support\Facades\Storage;
use Src\Domain\Users\DTO\Commands\UploadPhotoCommand;
use Src\Domain\Users\Models\User;

class UploadPhotoUserAction
{

    public function __invoke(UploadPhotoCommand $command)
    {
        /** @var User $user */
        $user = auth()->user();

        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }
        $path = Storage::disk('public')->put("/photos/$user->id", $command->file);

        $user->update(['photo' => $path]);
    }
}

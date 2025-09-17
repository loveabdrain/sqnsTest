<?php

namespace Src\Domain\Users\DTO\Data;

use Illuminate\Support\Facades\Storage;
use Spatie\LaravelData\Data;


class UserData extends Data
{

    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public ?string $photo
    ){
        $this->photo = $photo ? Storage::temporaryUrl($this->photo, 3600) : null;
    }
}

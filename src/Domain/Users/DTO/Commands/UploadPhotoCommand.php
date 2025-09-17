<?php

namespace Src\Domain\Users\DTO\Commands;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;


class UploadPhotoCommand extends Data
{

    public function __construct(
        public UploadedFile $file,
    ){

    }
}

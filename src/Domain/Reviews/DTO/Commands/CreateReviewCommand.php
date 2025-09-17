<?php

namespace Src\Domain\Reviews\DTO\Commands;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;


class CreateReviewCommand extends Data
{

    public function __construct(
        #[Required, Max(200)]
        public string $title,
        #[Required]
        public string $text,
        public ?string $isRecommended
    ){}
}

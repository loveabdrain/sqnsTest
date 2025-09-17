<?php

namespace Src\Domain\Reviews\DTO\Data;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Src\Domain\Users\DTO\Data\UserData;
use Src\Infrastructure\DTO\Casts\DateFormattingCaster;


class ReviewData extends Data
{
    public function __construct(
        public string $title,
        public string $text,
        public string $isRecommended,
        public ?UserData $user = null,
        #[MapInputName('created_at')]
        #[WithCast(DateFormattingCaster::class)]
        public string $date
    ){}
}

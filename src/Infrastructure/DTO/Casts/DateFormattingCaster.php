<?php

namespace Src\Infrastructure\DTO\Casts;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class DateFormattingCaster implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
        $formattingDate = CarbonImmutable::create($value)->format('d.m.Y H:i');
        return $formattingDate;
    }
}

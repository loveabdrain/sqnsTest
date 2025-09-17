<?php

namespace Src\Domain\Reviews\Actions;

use Src\Domain\Reviews\DTO\Commands\CreateReviewCommand;
use Src\Domain\Reviews\Models\Review;
use Src\Domain\Users\Models\User;

class CreateReviewAction
{
    public function __invoke(CreateReviewCommand $command)
    {
        /** @var User|null $user */
        $user = auth()->user();

        $review = Review::create(array_merge($command->toArray(), ['user_id' => $user?->id]));

        return $review;
    }
}

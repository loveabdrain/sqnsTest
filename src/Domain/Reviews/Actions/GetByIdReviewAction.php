<?php

namespace Src\Domain\Reviews\Actions;

use Src\Domain\Reviews\DTO\Data\ReviewData;
use Src\Domain\Reviews\Models\Review;

class GetByIdReviewAction
{
    public function __invoke(Review $review)
    {
        return ReviewData::from($review->load('user'));
    }
}

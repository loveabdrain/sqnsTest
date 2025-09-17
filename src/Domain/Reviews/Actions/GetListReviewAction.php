<?php

namespace Src\Domain\Reviews\Actions;

use Illuminate\Support\Facades\DB;
use Src\Domain\Reviews\DTO\Data\ReviewData;
use Src\Domain\Reviews\DTO\Query\GetListReviewQuery;
use Src\Domain\Reviews\Models\Review;

class GetListReviewAction
{
    public function __invoke(GetListReviewQuery $query)
    {
        $reviews = Review::query()
            ->with('user');

        $this->filters($reviews, $query);

        $reviews->orderBy($query->sortBy, $query->sortType);

        return ReviewData::collect($reviews->paginate($query->limit));
    }

    public function filters(mixed $reviews, GetListReviewQuery $query)
    {
        if ($query->keyword) {
            $reviews->where(DB::raw("LOWER(title)"), 'LIKE', "%$query->keyword%")
                ->orWhere(DB::raw("LOWER(text)"), 'LIKE', "%$query->keyword%");
        }
        if ($query->user_id) {
            $reviews->where('user_id', $query->user_id);
        }
    }
}

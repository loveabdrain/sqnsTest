<?php

namespace Src\Domain\Reviews\DTO\Query;

use Spatie\LaravelData\Data;


class GetListReviewQuery extends Data
{

    public function __construct(
        public ?int $page = 1,
        public ?int $limit = 10,
        public ?string $sortBy,
        public ?string $sortType,
        public ?string $keyword,
        public ?int $user_id = null
    ){
        $this->sortBy = $this->sortBy ?? 'created_at';
        $this->sortType = $this->sortType ?? 'asc';
    }
}

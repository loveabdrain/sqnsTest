<?php

namespace Src\Controllers;

use Illuminate\Http\JsonResponse;
use Src\Domain\Reviews\Actions\CreateReviewAction;
use Src\Domain\Reviews\Actions\GetByIdReviewAction;
use Src\Domain\Reviews\Actions\GetListReviewAction;
use Src\Domain\Reviews\DTO\Commands\CreateReviewCommand;
use Src\Domain\Reviews\DTO\Query\GetListReviewQuery;
use Src\Domain\Reviews\Models\Review;

class ReviewController extends Controller
{

    public function create(CreateReviewAction $action, CreateReviewCommand $command)
    {
        return new JsonResponse($action($command), 200);
    }

    public function getList(GetListReviewAction $action, GetListReviewQuery $query)
    {
        return new JsonResponse($action($query), 200);
    }

    public function getById(GetByIdReviewAction $action, Review $review)
    {
        return new JsonResponse($action($review), 200);
    }
}

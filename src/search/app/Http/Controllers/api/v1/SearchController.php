<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateSearchKeyword;
use App\Repositories\Interfaces\SearchRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class SearchController extends Controller
{
    /**
     * @var SearchRepository
     */
    private SearchRepository $search;

    /**
     * @param SearchRepository $searchRepository
     */
    public function __construct(SearchRepository $searchRepository)
    {
        $this->search = $searchRepository;
    }

    /**
     * @param ValidateSearchKeyword $request
     * @return JsonResponse
     */
    public function __invoke(ValidateSearchKeyword $request): JsonResponse
    {
        $result = $this->search->searchItemsByKeyword($request->only('keyword'));
        return response()->json($result, Response::HTTP_OK);
    }
}

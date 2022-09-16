<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\RouteServices\Search\SearchService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    /**
     * @var SearchService
     */
    private SearchService $searchService;

    /**
     * @param SearchService $searchService
     */
    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws GuzzleException
     */
    public function __invoke(Request $request): mixed
    {
        $response = $this->searchService->search($request);

        return Response::curl(
            $response->getBody()->getContents(),
            $response->getStatusCode()
        );
    }
}

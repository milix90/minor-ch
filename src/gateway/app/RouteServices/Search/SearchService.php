<?php

namespace App\RouteServices\Search;

use App\Entities\CurlHandler;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class SearchService extends CurlHandler implements SearchServiceInterface
{
    public function __construct()
    {
        $this->init(config('gateway.base_uri.search'));
    }

    /**
     * @param $request
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function search($request): ResponseInterface
    {
        return $this->setParams(config('gateway.routes.search.search'), $request)
            ->send();
    }
}

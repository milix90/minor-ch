<?php

namespace App\RouteServices\Client;

use App\Entities\CurlHandler;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class ClientService extends CurlHandler implements ClientServiceInterface
{

    public function __construct()
    {
        $this->init(config('gateway.base_uri.client'));
    }

    /**
     * @param $request
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function register($request): ResponseInterface
    {
        return $this->setParams(config('gateway.routes.client.register'), $request)
            ->send();
    }

    /**
     * @param $request
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function login($request): ResponseInterface
    {
        return $this->setParams(config('gateway.routes.client.login'), $request)
            ->send();
    }
}

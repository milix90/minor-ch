<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\RouteServices\Client\ClientService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    /**
     * @var ClientService
     */
    private ClientService $client;

    /**
     * @param ClientService $clientService
     */
    public function __construct(ClientService $clientService)
    {
        $this->client = $clientService;
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws GuzzleException
     */
    public function __invoke(Request $request): mixed
    {
        $response = $this->client->register($request);

        return Response::curl(
            $response->getBody()->getContents(),
            $response->getStatusCode()
        );
    }
}

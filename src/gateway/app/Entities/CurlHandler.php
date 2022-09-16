<?php

namespace App\Entities;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

abstract class CurlHandler
{
    use CurlHelper;

    /**
     * @var string
     */
    private string $method;

    /**
     * @var string
     */
    private string $uri;

    /**
     * @var array
     */
    private array $curlParams;

    /**
     * @var Client
     */
    private Client $curl;

    /**
     * @var array
     */
    private $headers = [];

    /**
     * @param $baseUri
     * @return void
     */
    public function init($baseUri)
    {
        $this->curl = new Client(['base_uri' => $baseUri]);
    }

    /**
     * @param array $params
     * @param $request
     * @return $this
     */
    public function setParams(array $params, $request): static
    {
        $this->method = $params['method'];
        $this->uri = $params['uri'];
        $this->setHeaders($request);

        $this->curlParams = [
            'http_errors' => false,
            'form_params' => $request->all(),
            'headers' => $this->headers,
            'query' => $request->query(),
        ];

        return $this;
    }

    /**
     * @throws GuzzleException
     */
    public function send(): ResponseInterface
    {
        return $this->curl->request($this->method, $this->uri, $this->curlParams);
    }
}

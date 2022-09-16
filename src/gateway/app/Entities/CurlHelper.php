<?php

namespace App\Entities;

trait CurlHelper
{

    /**
     * @param $request
     * @return void
     */
    private function setHeaders($request): void
    {
        $this->headers['Accept'] = 'application/json';

        if ($request->hasHeader('Authorization')) {
            $this->headers['Authorization'] = 'Bearer ' . $request->bearerToken();
        }

        /*todo: more headers could be managed here*/
    }
}

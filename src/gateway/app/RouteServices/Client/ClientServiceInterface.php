<?php

namespace App\RouteServices\Client;

interface ClientServiceInterface
{
    public function register($request);

    public function login($request);
}

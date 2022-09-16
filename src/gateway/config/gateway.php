<?php

return [
    'base_uri' => [
        'client' => env('CLIENT_BASE_URI', 'http://localhost:8055'),
        'search' => env('SEARCH_BASE_URI', 'http://localhost:8086'),
    ],
    'routes' => [
        'client' => [
            'register' => [
                'method' => 'POST',
                'uri' => '/api/v1/client/register',
            ],
            'login' => [
                'method' => 'POST',
                'uri' => '/api/v1/client/login',
            ],
        ],
        'search' => [
            'search' => [
                'method' => 'POST',
                'uri' => '/api/v1/search',
            ],
        ]
    ]
];

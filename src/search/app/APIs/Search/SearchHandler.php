<?php

namespace App\APIs\Search;

use App\APIs\Search\Services\Fidibo\FidiboAdaptor;

class SearchHandler implements SearchInterface
{
    const SERVICES = [
        FidiboAdaptor::class => 'fidibo',
    ];

    /**
     * @var mixed
     */
    private mixed $service;

    /**
     * @param $service
     */
    public function __construct($service = null)
    {
        $apiService = $service ?? 'fidibo';
        $this->service = new (array_search($apiService, self::SERVICES));
    }

    /**
     * @param $value
     * @return mixed
     */
    public function search($value): mixed
    {
        return $this->service->search($value);
    }
}

<?php

namespace App\APIs\Search\Services\Fidibo;

use App\APIs\Search\SearchInterface;

class FidiboAdaptor implements SearchInterface
{
    /**
     * @var Fidibo
     */
    private Fidibo $fidibo;

    public function __construct()
    {
        $this->fidibo = new Fidibo;
    }

    /**
     * @param $value
     * @return string
     */
    public function search($value): string
    {
        return $this->fidibo->searchByKeyword($value);
    }
}

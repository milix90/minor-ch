<?php

namespace App\Wrappers\Search;

use Illuminate\Support\Facades\Redis;

class ApiCache implements SearchWrapperInterface
{
    /**
     * @var string
     */
    private string $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getResult()
    {
        return (Redis::get($this->value) ?? (new ApiAccessor($this->value))->getResult());
    }
}

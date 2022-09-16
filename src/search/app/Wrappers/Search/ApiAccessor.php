<?php

namespace App\Wrappers\Search;

use App\APIs\Search\SearchHandler;
use Illuminate\Support\Facades\Redis;

class ApiAccessor implements SearchWrapperInterface
{
    /**
     * @var string
     */
    private string $value;
    /**
     * @var mixed
     */
    private mixed $result;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
        $this->sendSearchRequest(new SearchHandler);
    }

    /**
     * @param SearchHandler $searchHandler
     * @return void
     */
    private function sendSearchRequest(SearchHandler $searchHandler): void
    {
        $this->result = $searchHandler->search($this->value);
        Redis::setex($this->value, config('redis.ttl'), $this->result);
    }

    /**
     * @return mixed
     */
    public function getResult(): mixed
    {
        return $this->result;
    }
}

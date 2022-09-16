<?php

namespace App\APIs\Search\Services\Fidibo;

use Illuminate\Support\Facades\Http;

final class Fidibo
{
    /**
     * @var string
     */
    private string $url;

    public function __construct()
    {
        $this->url = config('search.api.fidibo');
    }

    /**
     * @param $keyword
     * @return string
     */
    public function searchByKeyword($keyword): string
    {
        $url = sprintf($this->url, $keyword);
        $results = Http::withHeaders([])->post($url, []);
        return $results->body();
    }
}

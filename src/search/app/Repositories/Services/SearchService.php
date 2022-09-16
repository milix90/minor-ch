<?php

namespace App\Repositories\Services;


use App\Repositories\BaseService;
use App\Repositories\Interfaces\SearchRepository;
use App\Wrappers\Search\ApiCache;

class SearchService extends BaseService implements SearchRepository
{
    /**
     * @param $value
     * @return array
     */
    public function searchItemsByKeyword($value): array
    {
        $escapedKeyword = str_replace(
            ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '=', '+', '/', '\\', '?', '<', '>', '`', '~'],
            "", $value['keyword']);

        $search = new ApiCache($escapedKeyword);
        $search = json_decode($search->getResult(), true);

        $items = collect($search['books']['hits']['hits']);
        $items = $items->map(function ($item) {
            return [
                'id' => $item['_source']['id'],
                'title' => $item['_source']['title'],
                'slug' => $item['_source']['slug'],
                'content' => $item['_source']['content'],
                'authors' => $item['_source']['authors'],
                'publishers' => $item['_source']['publishers'],
                'image_name' => $item['_source']['image_name'],
            ];
        });

        return $items->toArray();
    }
}

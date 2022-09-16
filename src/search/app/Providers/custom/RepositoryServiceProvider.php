<?php

namespace App\Providers\custom;

use App\Repositories\BaseRepository;
use App\Repositories\BaseService;
use App\Repositories\Interfaces\SearchRepository;
use App\Repositories\Services\SearchService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepository::class, BaseService::class);
        $this->app->bind(SearchRepository::class, SearchService::class);
    }
}

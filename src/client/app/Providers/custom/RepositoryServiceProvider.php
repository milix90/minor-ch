<?php

namespace App\Providers\custom;

use App\Repositories\BaseRepository;
use App\Repositories\BaseService;
use App\Repositories\Interfaces\UserRepository;
use App\Repositories\Services\UserService;
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
        $this->app->bind(UserRepository::class, UserService::class);
    }
}

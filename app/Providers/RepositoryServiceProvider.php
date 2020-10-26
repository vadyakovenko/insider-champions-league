<?php

namespace App\Providers;

use App\Services\League\Repositories\LeagueDatabaseRepository;
use App\Services\League\Repositories\LeagueRepositoryInterface;
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
        $this->app->bind(LeagueRepositoryInterface::class, LeagueDatabaseRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

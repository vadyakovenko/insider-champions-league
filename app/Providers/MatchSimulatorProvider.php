<?php

namespace App\Providers;

use App\Services\Match\MatchSimulator\MatchSimulatorInterface;
use App\Services\Match\MatchSimulator\RandomMatchSimulatorInterface;
use Illuminate\Support\ServiceProvider;

class MatchSimulatorProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MatchSimulatorInterface::class, RandomMatchSimulatorInterface::class);
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

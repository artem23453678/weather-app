<?php

namespace App\Providers;

use App\Repositories\WeatherRepository;
use App\Repositories\Interfaces\WeatherRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            WeatherRepositoryInterface::class,
            WeatherRepository::class
        );
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RestaurantRepository;
use App\Interfaces\RestaurantRepositoryInterface;

class RestaurantServiceProvider extends ServiceProvider
{
    /**
     * Register Restaurant application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            RestaurantRepositoryInterface::class,
            RestaurantRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MovieRepository;
use App\Interfaces\MovieRepositoryInterface;

class MovieServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            MovieRepositoryInterface::class, 
            MovieRepository::class
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

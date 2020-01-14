<?php

namespace App\Providers;

use Apitizer\ExceptionStrategy\Ignore;
use Apitizer\ExceptionStrategy\Strategy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->app->bind(Strategy::class, Ignore::class);
    }
}

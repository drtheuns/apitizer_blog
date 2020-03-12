<?php

namespace App\Providers;

use Apitizer\ExceptionStrategy\Ignore;
use Apitizer\ExceptionStrategy\Strategy;
use Apitizer\Rendering\JsonApiRenderer;
use Apitizer\Rendering\ReferenceMapRenderer;
use Apitizer\Rendering\Renderer;
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
        // $this->app->bind(Renderer::class, ReferenceMapRenderer::class);
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

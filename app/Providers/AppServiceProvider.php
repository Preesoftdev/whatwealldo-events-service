<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Exceptions\Handler;
use App\Http\Middleware\ClientMiddleware;
use Illuminate\Contracts\Debug\ExceptionHandler as ExceptionHandlerContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ExceptionHandlerContract::class, Handler::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Route::aliasMiddleware('admin', AdminMiddleware::class);
        Route::aliasMiddleware('client', ClientMiddleware::class);
    }
}

<?php

namespace App\Providers;

use App\Interface\PagamentoInterface;
use App\Services\PagamentoServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            PagamentoInterface::class,
            PagamentoServiceImpl::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

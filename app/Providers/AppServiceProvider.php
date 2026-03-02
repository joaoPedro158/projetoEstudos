<?php

namespace App\Providers;

use App\Interface\PagamentoInterface;
use App\Interface\RegistraCompra;
use App\Services\PagamentoServiceImpl;
use App\Services\RegistraCompraServiceImpl;
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

        $this->app->bind(
            RegistraCompra::class,
            RegistraCompraServiceImpl::class
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

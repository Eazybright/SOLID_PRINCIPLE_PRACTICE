<?php

namespace App\Providers;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\StockRepositoryInterface;
use App\Repositories\MysqlProductRepository;
use App\Repositories\MysqlStockRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Payable;
use App\Services\StripePaymentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, MysqlProductRepository::class);
        $this->app->bind(StockRepositoryInterface::class, MysqlStockRepository::class);
        $this->app->bind(Payable::class, StripePaymentService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
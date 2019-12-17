<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\ProductRepositoryInterface',
            'App\Repositories\MysqlProductRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\StockRepositoryInterface',
            'App\Repositories\MysqlStockRepository'
        );
    }
}
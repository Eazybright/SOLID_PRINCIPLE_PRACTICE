<?php

namespace App\Repositories\Contracts;

interface StockRepositoryInterface
{
    public function forProduct($product_id);

    public function checkAvailibility($stock);

    public function record($product_id);
}
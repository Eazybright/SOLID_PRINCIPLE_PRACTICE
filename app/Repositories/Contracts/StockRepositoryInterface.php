<?php

namespace App\Repositories\Contracts;


/**
 * Interface StockRepositoryInterface
 *
 * @package App\Repositories\Contracts
 */
interface StockRepositoryInterface
{
    /**
     * @param $product_id
     * @return mixed
     */
    public function forProduct($product_id);

    /**
     * @param $stock
     * @return mixed
     */
    public function checkAvailibility($stock);

    /**
     * @param $product_id
     * @return mixed
     */
    public function record($product_id);

}

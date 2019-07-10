<?php

namespace App\Repositories\Contracts;


interface ProductRepositoryInterface
{
    /**
     * @param $product_id
     * @return mixed
     */
    public function getById($product_id);
}

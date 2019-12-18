<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\ProductRepositoryInterface;

class MysqlProductRepository implements ProductRepositoryInterface
{
    /**
     * @param $product_id
     * @return \Illuminate\Database\Query\Builder|mixed
     */
    public function getById($product_id)
    {
        return DB::table('products')->find($product_id);
    }

}
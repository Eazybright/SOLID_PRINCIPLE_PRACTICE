<?php

namespace App\Repositories;


use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

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

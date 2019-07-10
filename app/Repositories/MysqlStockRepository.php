<?php

namespace App\Repositories;


use App\Repositories\Contracts\StockRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class MysqlStockRepository implements StockRepositoryInterface
{
    public const MINIMUM_STOCK_LEVEL = 1;

    /**
     * @param $product_id
     * @return \Illuminate\Database\Query\Builder
     */
    public function forProduct($product_id)
    {
        return DB::table('stocks')->where('product_id', $product_id)->first();
    }

    /**
     * @param $product_id
     * @return \Illuminate\Database\Query\Builder
     */
    public function checkAvailibility($stock)
    {
        // check the stock level
        if ($stock->quantity < self::MINIMUM_STOCK_LEVEL) {
            throw ValidationException::withMessages([
                'stock' => ['we are out of stock ']
            ]);
        }

        return $stock;
    }

    /**
     * @param $product_id
     */
    public function record($product_id)
    {
        // update Stock
        $stock = DB::table('stocks')
            ->where('product_id', $product_id);

        $stock->update([
            'quantity' => $stock->first()->quantity - 1
        ]);
    }
}

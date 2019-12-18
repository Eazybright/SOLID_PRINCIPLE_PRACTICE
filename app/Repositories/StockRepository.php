<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class StockRepository
{
    const MIN_STOCK_LEVEL = 1;
    
    public function getStockByProduct($product_id)
    {
        return DB::table('stocks')->where('product_id', "=", $product_id)->first();
    }

    public function checkStockAvailability($stock)
    {        
        // check the stock level
        if ($stock->quantity < self::MIN_STOCK_LEVEL) {
            // throw new NotFoundHttpException('We are out of stock');
            throw ValidationException::withMessages([
                'message' => 'We are out of stock'
            ]);
        }

        return $stock;
    }

    public function recordData($product_id)
    {
        $stock = DB::table('stocks')->where('product_id', "=", $product_id);
        
        // update Stock
        $stock->update([
                'quantity' => $stock->first()->quantity - self::MIN_STOCK_LEVEL
            ]);
    }
}
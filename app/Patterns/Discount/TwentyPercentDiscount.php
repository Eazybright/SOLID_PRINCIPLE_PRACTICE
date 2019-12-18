<?php

namespace App\Patterns\Discount;

use App\Patterns\Discount\Discountable;

class TwentyPercentDiscount implements Discountable
{
    public function apply($product){
        $discount = 0.20 * $product->price;
        return number_format($product->price - $discount,2);
    }
}
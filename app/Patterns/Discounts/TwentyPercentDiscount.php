<?php

namespace App\Patterns\Discounts;


class TwentyPercentDiscount implements Discountable
{
    /**
     * @param $product
     * @return string
     */

    public function apply($product)
    {
        $discount = 0.20 * $product->price;
        return number_format($product->price - $discount,2);
    }
}

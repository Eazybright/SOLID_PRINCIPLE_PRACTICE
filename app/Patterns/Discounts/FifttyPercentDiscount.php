<?php

namespace App\Patterns\Discounts;


class FifttyPercentDiscount implements Discountable
{
    /**
     * @param $product
     * @return string
     */

    public function apply($product)
    {
        $discount = 0.50 * $product->price;
        return number_format($product->price - $discount,2);
    }
}

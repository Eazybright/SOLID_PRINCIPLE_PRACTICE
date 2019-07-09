<?php

namespace App\Services;


/**
 * Class DiscountService
 *
 * @package App\Services
 */
class DiscountService
{

    /** @var */
    protected $product;

    /**
     * @param $product
     * @return $this
     */
    public function with($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return string
     */
    public function applySpecialDiscount()
    {
        $discount = 0.20 * $this->product->price;
        return number_format($this->product->price - $discount,2);
    }
}

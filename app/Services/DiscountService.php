<?php

namespace App\Services;

class DiscountService
{
    protected $product;
    
    public function with($product){
        $this->product = $product;
        return $this;
    }

    public function applySpecialDiscount()
    {
        $discount = 0.20 * $this->product->price;
        return number_format(($this->product->price - $discount),2);
    }
}
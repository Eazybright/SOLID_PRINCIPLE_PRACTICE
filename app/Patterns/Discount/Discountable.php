<?php

namespace App\Patterns\Discount;

interface Discountable
{
    public function apply($product);
}
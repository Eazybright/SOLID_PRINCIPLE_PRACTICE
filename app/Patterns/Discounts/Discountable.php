<?php

namespace App\Patterns\Discounts;


interface Discountable
{
   public function apply($product);
}

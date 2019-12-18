<?php

namespace App\Services;

use App\Patterns\Discount\Discountable;

/**
 * Class DiscountService
 *
 * @package App\Services
 */
class DiscountService
{
    protected $product;
    protected $discountable;

    public function __construct(Discountable $discountable)
    {
        $this->discountable = $discountable;
    }

    public static function make(Discountable $discountable)
    {
        return new static($discountable);
    }
    /**
     * @param $product
     * @return $this
     */
    public function with($product)
    {
        $this->product = $product;

        return $this;
    }

    public function apply()
    {
        return $this->discountable->apply($this->product);
    }
}
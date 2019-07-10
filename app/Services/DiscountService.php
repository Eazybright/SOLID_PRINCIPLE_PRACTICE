<?php

namespace App\Services;


use App\Patterns\Discounts\Discountable;

/**
 * Class DiscountService
 *
 * @package App\Services
 */
class DiscountService
{

    /** @var */
    protected $product;

    /** @var Discountable */
    protected $discountable;

    public function __construct(Discountable $discountable)
    {
        $this->discountable = $discountable;
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

    /**
     * @return mixed
     */
    public function apply()
    {
        return $this->discountable->apply($this->product);
    }
}

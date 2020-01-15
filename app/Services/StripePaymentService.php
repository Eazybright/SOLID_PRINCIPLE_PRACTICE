<?php

namespace App\Services;

use App\Interfaces\Payable;

/**
 * Class StripePaymentService
 *
 * @package App\Services
 */
class StripePaymentService implements Payable
{
    /**
     * @param $total
     * @return string
     */
    public function process($total)
    {
        $price = "£{$total}";
        return 'Processing payment of ' . $price . ' through Stripe';
    }
}
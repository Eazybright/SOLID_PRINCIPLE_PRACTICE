<?php

namespace App\Services;

/**
 * Class StripePaymentService
 *
 * @package App\Services
 */

class StripePaymentService
{
    public function processPaymentViaStripe($total)
    {
        $price = "£{$total}";
        return 'Processing payment of ' . $price . ' through Stripe';
    }
}

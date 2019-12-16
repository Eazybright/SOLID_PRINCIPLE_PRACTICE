<?php

namespace App\Services;

class StripePaymentService
{
    public function processPaymentViaStripe($total)
    {
        $price = "£{$total}";
        return 'Processing payment of ' . $price . ' through Stripe';
    }
}
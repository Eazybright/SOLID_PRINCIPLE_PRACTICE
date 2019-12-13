<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderProcessingService
{
    public function execute($product_id, Request $request)
    {
        // Find the Product
        $product = DB::table('products')->find($product_id);

        // Get the stock level
        $stock = DB::table('stocks')->find($product_id);

        // check the stock level
        if ($stock->quantity < 1) {
            throw new NotFoundHttpException('We are out of stock');
        }

        // Apply discount
        $total = $this->applySpecialDiscount($product);

        // check for payment method
        $paymentSuccessMessage = '';

        // Attempt payment
        if ($request->has('payment_method') && $request->input('payment_method') === 'stripe') {
            $paymentSuccessMessage = $this->processPaymentViaStripe('stripe', $total);
        }
        // return $paymentSuccessMessage;
        // payment succeeded
        if (!empty($paymentSuccessMessage)) {
            
            // update Stock
            DB::table('stocks')
                ->where('product_id', $product_id)
                ->update([
                    'quantity' => $stock->quantity - 1
                ]);

            return [
                'payment_message' => $paymentSuccessMessage,
                'discounted_price' => $total,
                'original_price'  => $product->price,
                'message' => 'Thank you, your order is being processed'
            ];
        }

    }

    protected function processPaymentViaStripe($provider, $total)
    {
        $price = "£{$total}";
        return 'Processing payment of ' . $price . ' through ' . $provider;
    }

    protected function applySpecialDiscount($product)
    {
        $discount = 0.20 * $product->price;
        return number_format(($product->price - $discount),2);
    }

}
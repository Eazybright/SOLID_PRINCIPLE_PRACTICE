<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Repositories\ProductRepository;
use App\Repositories\StockRepository;
use App\Services\DiscountService;
use App\Services\StripePaymentService; 

class OrderProcessingService
{
    protected $productRepo;
    protected $stockRepo;
    protected $discountService;
    protected $stripeService;
    
    public function __construct(ProductRepository $productRepo, 
                                StockRepository $stockRepo,
                                DiscountService $discountService,
                                StripePaymentService $stripeService)
    {
        $this->productRepo = $productRepo;
        $this->stockRepo = $stockRepo;
        $this->discountService = $discountService;
        $this->stripeService= $stripeService;
    }

    public function execute($product_id, Request $request)
    {
        // Find the Product
        $product = $this->productRepo->getById($product_id);

        // Get the stock level
        $stock = $this->stockRepo->getStockByProduct($product_id); 
        
        //check stock availability
        $this->stockRepo->checkStockAvailability($stock);

        // Apply discount
        $total = $this->discountService->with($product)->applySpecialDiscount();

        // Attempt payment
        $paymentSuccessMessage = $this->stripeService->processPaymentViaStripe($total);

        // payment succeeded    
        $this->stockRepo->recordData($product_id);
        
        return [
            'payment_message' => $paymentSuccessMessage,
            'discounted_price' => $total,
            'original_price'  => $product->price,
            'message' => 'Thank you, your order is being processed'
        ];
    }

}
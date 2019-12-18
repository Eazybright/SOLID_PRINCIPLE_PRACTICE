<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\OrderProcessingService;
use Illuminate\Http\Request;

class ProcessOrdersController extends Controller
{
    /** @var OrderProcessingService */
    protected $orderProcessingService;

    public function __construct(OrderProcessingService $orderProcessingService)
    {
        $this->orderProcessingService = $orderProcessingService;
    }

    /**
     * Handle the incoming request
     *
     * @param Product $product
     * @param \Illuminate\Http\Request $request
     * @return array

     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke($product_id, Request $request)
    {
        //check if payment method is selected
        $this->validate($request, [
            'payment_method' => 'required|string'
        ]);


        return $this->orderProcessingService->execute($product_id, $request);
    }
}

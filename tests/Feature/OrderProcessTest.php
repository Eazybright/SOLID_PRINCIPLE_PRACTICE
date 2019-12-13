<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderProcessTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Proceess user orders.
     *
     * @test
     */
    public function a_user_order_can_be_processed(): void
    {
        //create product and stock
        $product = factory(Product::class)->create();

        $stock = factory(Stock::class)->create([
            'product_id' => $product->id
        ]);

        $response = $this->post('order/{$product->id}/process', [
            'payment_method' => 'stripe'
        ])->assertOk()->json();

        // echo $response;
    }
}
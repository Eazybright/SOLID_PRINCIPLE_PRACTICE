<?php

namespace Tests\Feature;

use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderProcessTest extends TestCase
{
    // use RefreshDatabase;

    /** @test */
    public function a_user_order_can_be_processed(): void
    {
        $product = factory(\App\Models\Product::class)->create();

        $stock = factory(\App\Models\Stock::class)->create([
            'product_id' => $product->id
        ]);

       $response =  $this->post("/order/{$product->id}/process", [
            'payment_method' => 'stripe'
        ])->assertOk()->json();

       $this->assertArrayHasKey('payment_message', $response);
       $this->assertArrayHasKey('discounted_price', $response);
       $this->assertArrayHasKey('original_price', $response);
       $this->assertArrayHasKey('message', $response);

        $this->assertDatabaseHas('stocks', [
            'quantity' => $stock->quantity - 1
        ]);

    }

    /** @test */
    public function an_exception_is_thrown_if_stock_is_less_than_one(): void
    {
        $this->expectException(ValidationException::class);

        $product = factory(\App\Models\Product::class)->create();

        factory(\App\Models\Stock::class)->create([
            'quantity' => 0,
            'product_id' => $product->id
        ]);

        $this->withoutExceptionHandling()
            ->post("/order/{$product->id}/process", [
                'payment_method' => 'stripe'
            ]);

    }
}
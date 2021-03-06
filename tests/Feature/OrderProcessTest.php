<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Stock;
use App\Models\Product;
use PHPUnit\Framework\expectException;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderProcessTest extends TestCase
{
    // use RefreshDatabase;
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

        $response = $this->post("order/{$product->id}/process", [
            'payment_method' => 'stripe'
        ])->assertOk()->json();

        //test response message for correctness
        $this->assertArrayHasKey('payment_message', $response);
        $this->assertArrayHasKey('discounted_price', $response);
        $this->assertArrayHasKey('original_price', $response);
        $this->assertArrayHasKey('message', $response);

        //test stock database data
        $this->assertDatabaseHas('stocks', [
            'quantity' => $stock->quantity = 30
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

        $response = $this->withoutExceptionHandling()->post("order/{$product->id}/process", [
            'payment_method' => 'stripe'
        ]);
        $this->withoutExceptionHandling()
            ->post("/order/{$product->id}/process", [
                'payment_method' => 'stripe'
            ]);
    }
}
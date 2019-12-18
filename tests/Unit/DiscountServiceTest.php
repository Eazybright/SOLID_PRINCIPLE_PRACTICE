<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Services\DiscountService;
use Illuminate\Foundation\Testing\WithFaker;
use App\Patterns\Discount\FiftyPercentDiscount;
use App\Patterns\Discount\TwentyPercentDiscount;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiscountServiceTest extends TestCase
{
    /** @test */
    public function it_applies_20_percent_discount(): void
    {
        $product = factory(Product::class)->make([
            'price' => 40
        ]);

        $discount_service = new DiscountService(new TwentyPercentDiscount);
        $total = $discount_service->with($product)->apply();

        $this->assertSame(32, intval($total));
    }

    /** @test */
    public function it_applies_50_percent_discount(): void
    {
        $product = factory(Product::class)->make([
            'price' => 10
        ]);

        $discount_service = new DiscountService(new FiftyPercentDiscount);
        $total = $discount_service->with($product)->apply();

        $this->assertSame(5, intval($total));
    }

    /** @test */
    public function it_applies_50_percent_discount_if_service_is_instantiated(): void
    {
        $product = factory(Product::class)->make([
            'price' => 10
        ]);

        $discount_service = DiscountService::make(new FiftyPercentDiscount)->with($product)->apply();

        $this->assertSame(5, intval($discount_service));
    }
}
<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Patterns\Discounts\FifttyPercentDiscount;
use App\Patterns\Discounts\TwentyPercentDiscount;
use App\Services\DiscountService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiscountsServiceTest extends TestCase
{

    /** @test */
    public function it_applies_20_percent_discount_correctly(): void
    {
        $product = factory(Product::class)->make([
            'price'  => 40
        ]);

        $discountService = new DiscountService(new TwentyPercentDiscount);
        $total = $discountService->with($product)->apply();

        // 32
        $this->assertSame(32, intval($total));

    }

    /** @test */
    public function it_applies_50_percent_discount_correctly(): void
    {
        $product = factory(Product::class)->make([
            'price'  => 10
        ]);

        $discountService = new DiscountService(new FifttyPercentDiscount);
        $total = $discountService->with($product)->apply();

        // 5
        $this->assertSame(5, intval($total));
    }

    /** @test */
    public function it_applies_20_percent_discount_correctly_if_service_is_instantiated_through_make_method(): void
    {
        $product = factory(Product::class)->make([
            'price'  => 40
        ]);

//        $discountService = new DiscountService(new TwentyPercentDiscount);
        $total = DiscountService::make(new TwentyPercentDiscount)->with($product)->apply();

        // 32
        $this->assertSame(32, intval($total));

    }
}

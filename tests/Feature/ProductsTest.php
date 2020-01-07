<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use App\Repositories\ApiRepository; 

class ProductsTest extends TestCase
{
    /**
     * @test
     */
    public function a_user_can_browse_all_products(): void
    {
        // $products = factory(Product::class, 10)->create();
        $products = app(ApiRepository::class)->all();

        $response = $this->get('/')->assertOk();

        $data = $response->viewData('products', $products);

        // $this->assertSame($products->count(), $data->count());

        $this->assertInstanceOf(Product::class, $data->first());
    }
}
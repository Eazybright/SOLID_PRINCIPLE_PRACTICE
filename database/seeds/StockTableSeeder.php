<?php

use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = \App\Models\Product::all();
        foreach ($products as $product)
        {
            factory(\App\Models\Stock::class)->create([
                'product_id' => $product->id
            ]);
        }
    }
}

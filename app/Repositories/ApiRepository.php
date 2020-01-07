<?php

namespace App\Repositories;

use App\Repositories\Repository;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;

class ApiRepository extends Repository
{
    public function all(): Collection
    {
        $products = File::get(storage_path('products.json'));
        $products = json_decode($products, true);
        $products = Product::hydrate($products);
        // dd($products);
        return $products;
    }
}
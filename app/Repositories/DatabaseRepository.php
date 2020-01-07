<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Collection;

class DatabaseRepository extends Repository
{
    public function all(): Collection
    {
        return Product::all();
    }
}
<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function getById($id){
        return DB::table('products')->find($id);
    }
}
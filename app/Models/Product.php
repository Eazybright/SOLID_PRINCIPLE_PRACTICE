<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function scopeInStock()
    {
        return $this->stock->quantity > 0;
    }

    public function scopeUpdateStock()
    {
        $this->stock()->update([
            'quantity'  => $this->stock->quantity - 1
        ]);
    }
}

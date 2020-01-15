<?php

namespace App\Services;

use App\Interfaces\Orderable;

abstract class OrderManagerService implements Orderable
{
    protected $total;
    protected $item;
    protected $delivery_message;
    
    public function __construct($items = [])
    {
        $this->items = $items;
    }
    
    public function calculate()
    {
        $this->total = collect($this->items)->sum('point');
        return $this;
    }

    public function discount($discount = 0.02)
    {
        $this->total -= $this->total * $discount;
        return $this;
    }

    abstract public function process();
}
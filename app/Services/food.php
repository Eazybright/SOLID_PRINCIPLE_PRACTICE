<?php

interface Food{
    public function pay();
}

class Pizza implements Food{
    
    public function price()
    {
        return 20;
    }

    public function pay(){}
}

class Burger implements Food{
    
    protected $discount;
    
    public function discount($discount)
    {
        $this->discount = $discount;
    }
    public function price()
    {
        return 20 - $this->discount;
        
    }

     public function pay(){}
}

class Panini implements Food
{
    protected $price = 10;
    
    public function price(){
        return $this->price;
    }

    public function pay(){}
}

class Bill implements Food{
    
    public function pay(Food $item)
    {
        // if ( is_a($item, 'Burger') )
        // {
        //      $item->discount(5);
        //      return $item->price();
        // }
        
        // return $item->price();
        return $item->pay();
    }
}
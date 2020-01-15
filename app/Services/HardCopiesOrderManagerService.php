<?php

namespace App\Services;

use App\Interfaces\Shippable;
use App\Services\OrderManagerService;

class HardCopiesOrderManagerService extends OrderManagerService implements Shippable
{
    public function shipping(int $shipping)
    {
        $this->total +=$shipping;
        return $this;
    }

    public function delivery($company)
    {
        $this->delivery_message = 'Delivery will be made by '.$company;
        return $this;
    }

    public function process()
    {
        return (object)[
                'delivery' => 'hard copy download link',
                'paid' => $this->total
            ];
    }
}
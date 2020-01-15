<?php

namespace App\Interfaces;

interface Shippable
{
    public function delivery($company);

    public function shipping(int $shipping);
}
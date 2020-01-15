<?php

namespace App\Interfaces;

interface Payable
{
    public function process($total);
}
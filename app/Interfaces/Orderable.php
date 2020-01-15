<?php

namespace App\Interfaces;

interface Orderable
{
    public function calculate();

    public function discount($discount);

    public function process();
}
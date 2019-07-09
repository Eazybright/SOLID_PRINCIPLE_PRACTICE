<?php

namespace App\Patterns;


interface Shapable
{
    public function area();
}

// square
// width * height
class Square implements Shapable
{
    public $height;
    public $width;

    public function __construct($height, $width)
    {
        $this->height = $height;
        $this->width = $width;
    }

    public function area()
    {
        return $this->width * $this->height;
    }
}

// triangle
// height * base/ 2

class Triangle implements Shapable
{
    public $height;
    public $base;

    public function __construct($height, $base)
    {
        $this->height = $height;
        $this->base = $base;
    }

    public function area()
    {
        return $this->height * $this->base / 2;
    }
}


// circle   -- pi radius * 2

class Circle implements Shapable
{
    protected $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function area()
    {
        return $this->radius * $this->radius * pi();
    }
}


class AreaCalculator
{
    public function calculate(Shapable $shapable)
    {
        return $shapable->area();
    }

}

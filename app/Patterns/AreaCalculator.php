<?php

namespace App\Patterns;

interface Shapeable
{
    public function area();
}

//Square
//width * height
class Square implements Shapeable
{
    public $width;
    public $height;

    public function __construct($height, $width)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function area()
    {
        return "Given:\n height = ".$this->height."\n width = ".$this->width.
                "\n Area of a sqaure = ".$this->height * $this->width / 2;
    }
}

//area of a triangle 
class Triangle implements Shapeable
{
    public $base;
    public $height;

    public function __construct($height, $base)
    {
        $this->base = $base;
        $this->height = $height;
    }

    public function area()
    {
        return "Given:\n height = ".$this->height."\n base = ".
                $this->base."\n Area of a triangle = ".$this->height * $this->base / 2;
    }
}

//area of a circle
class Circle implements Shapeable
{
    public $radius;
    const PI = 3.142;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function area()
    {
        return "Given:\n radius = ".$this->radius."\n Area of a circle = ".self::PI * $this->radius ** 2;
    }
}

class AreaCalculator
{
    public function calculate(Shapeable $shape)
    {
        return $shape->area();
    }
}
<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sku' => $faker->randomElement(['BP063-0001','BP063-0002','BP063-0003','UA064-0002']),
        'name' => $faker->randomElement(['Giorgio','Firetrap','Kangol','Ben Sherman']),
        'price' => $faker->randomElement(['120.25','140.35','156.99'])
    ];
});

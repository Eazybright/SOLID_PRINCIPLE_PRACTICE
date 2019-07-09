<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'quantity' => $faker->randomElement([30,20,45,40]),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));

    return [
        'name' => $faker->unique()->productName,
        'photo' => '',
        'price' => $faker->randomNumber(2),
        'active' => $faker->boolean()
    ];
});

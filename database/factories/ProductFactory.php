<?php

use Faker\Generator as Faker;

$factory->define(EcommerceMobly\Domains\Products\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(5),
        'description' => $faker->text(),
        'price' => $faker->randomNumber(),
    ];
});

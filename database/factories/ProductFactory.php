<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unit;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence,
        'unit' => Unit::all()->random()->unit_name,
        'price' => $faker->numberBetween(10,100),
        'total' => $faker->numberBetween(40,567),
        'category_id' => $faker->numberBetween(1,5),
        'discount' => 0,
        'option' => '',   
    ];
});

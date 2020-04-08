<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\product_tag;
use Faker\Generator as Faker;

$factory->define(product_tag::class, function (Faker $faker) {
    return [
        'product_id' => $faker->unique()->numberBetween(1,100),
        'tag_id' => $faker->numberBetween(1,10),
    ];
});

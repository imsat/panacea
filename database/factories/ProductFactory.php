<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Category;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->sentence(3);
    return [
        'product_name' => $name,
        'product_slug' => Str::slug($name),
        'category_id' => Category::all()->random()->id,
        'product_description' => $faker->sentence,
        'product_warranty' => $faker->month,
    ];
});

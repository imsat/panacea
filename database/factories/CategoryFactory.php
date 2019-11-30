<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        'category_name' => $name,
        'category_slug' => Str::slug($name),
        'category_description' => $faker->sentence,
    ];
});

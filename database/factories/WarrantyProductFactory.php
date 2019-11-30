<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WarrantyProduct;
use Faker\Generator as Faker;
use App\Product;
use App\User;
use Carbon\Carbon;

$factory->define(WarrantyProduct::class, function (Faker $faker) {

    $start_date = Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = '+2 days', $endDate = '+5 week')->getTimeStamp()) ;

    $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $start_date)->addMonth( $faker->numberBetween( 1, 36 ) );

    return [
        'product_id' => Product::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'alphabetic_code' => $faker->unique()->numberBetween(1000000,9999999),
        'warranty_start_date' => $start_date,
        'warranty_end_date' => $end_date,
    ];
});

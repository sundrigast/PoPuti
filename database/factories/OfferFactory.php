<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'ride_id' => \App\Models\Ride::inRandomOrder()->take(1)->pluck('id')->first(),
        'driver_id' => \App\Models\User::inRandomOrder()->take(1)->pluck('id')->first(),
        'price' => $faker->numberBetween(150, 1000),
    ];
});

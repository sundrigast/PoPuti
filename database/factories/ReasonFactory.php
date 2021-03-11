<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reason;
use App\Models\Ride;
use Faker\Generator as Faker;

$factory->define(Reason::class, function (Faker $faker) {
    return [
        'text' => $faker->words(random_int(1, 7), true),
        'by_passenger' => $faker->randomElement([false, true]),
        'ride_id' => Ride::inRandomOrder()->take(1)->pluck('id')->first(),
    ];
});

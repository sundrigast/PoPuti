<?php

/** @var Factory $factory */

use App\Models\Ride;
use App\Models\Schedule;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Schedule::class, function (Faker $faker) {
    return [
        'monday' => $faker->boolean(),
        'tuesday' => $faker->boolean(),
        'wednesday' => $faker->boolean(),
        'thursday' => $faker->boolean(),
        'friday' => $faker->boolean(),
        'saturday' => $faker->boolean(),
        'sunday' => $faker->boolean(),
        'time' => $faker->time($format = 'H:i'),
        'ride_id' => Ride::inRandomOrder()->take(1)->pluck('id')->first(),
    ];
});

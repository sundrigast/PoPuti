<?php

/** @var Factory $factory */

use App\Models\Ride;
use App\Models\RideStatus;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Ride::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
        'driver_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
        'status_id' => RideStatus::inRandomOrder()->take(1)->pluck('id')->first(),
        'position' => $faker->address,
        'from_lat' => $faker->latitude($min = 59, $max = 61),
        'from_lng' => $faker->longitude($min = 30, $max = 31),
        'destination' => $faker->address,
        'to_lat' => $faker->latitude($min = 59, $max = 61),
        'to_lng' => $faker->longitude($min = 30, $max = 31),
        'price' => $faker->numberBetween(150, 1000),
        'comment' => $faker->words(random_int(2, 10), true),
        'start_at' => $faker->dateTime(),
        'finish_at' => $faker->dateTime(),
        'ride_duration' => $faker->time,
    ];
});

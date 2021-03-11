<?php

/** @var Factory $factory */

use App\Models\Driver;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Driver::class, function (Faker $faker) {
    return [
        'user_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
        'latitude' => $faker->latitude($min = 59, $max = 61),
        'longitude' => $faker->longitude($min = 30, $max = 31),
        'passport' => $faker->isbn13,
        'drivers_license' => $faker->isbn10,
        'car_brand' => $faker->words(random_int(1, 2), true),
        'car_model' => $faker->words(random_int(1, 2), true),
        'car_number' => $faker->numberBetween($min = 100, $max = 999),
        'registration' => $faker->isbn13,
        'verify' => $faker->boolean,
    ];
});

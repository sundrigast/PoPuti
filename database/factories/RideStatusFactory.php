<?php

/** @var Factory $factory */

use App\Models\RideStatus;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(RideStatus::class, function (Faker $faker) {
    return [
        'name' => $faker->words(random_int(1, 3), true),
    ];
});

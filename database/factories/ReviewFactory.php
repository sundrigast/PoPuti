<?php

/** @var Factory $factory */

use App\Models\Review;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'text' => $faker->words(random_int(2, 10), true),
        'rating' => $faker->numberBetween($min = 1, $max = 5),
        'from_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
        'to_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
    ];
});

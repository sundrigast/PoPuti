<?php

/** @var Factory $factory */

use App\Models\Message;
use App\Models\Ride;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'ride_id' => Ride::inRandomOrder()->take(1)->pluck('id')->first(),
        'author_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
        'text' => $faker->words(random_int(2, 15), true),
        'is_read' => $faker->randomElement([true, false]),
    ];
});

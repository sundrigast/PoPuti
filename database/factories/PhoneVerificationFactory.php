<?php

/** @var Factory $factory */

use App\Models\PhoneVerification;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(PhoneVerification::class, function (Faker $faker) {
    return [
        'code' => random_int(1000, 9999),
        'user_id' => User::inRandomOrder()
            ->take(1)
            ->pluck('id')
            ->first()

    ];
});

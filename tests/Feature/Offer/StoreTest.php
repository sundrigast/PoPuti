<?php

namespace Tests\Feature\Offer;

use App\Models\Offer;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    public function testSuccess()
    {
        $data = [
            'ride_id' => Ride::inRandomOrder()->take(1)->pluck('id')->first(),
            'driver_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
            'price' => $this->faker->numberBetween(150, 1000),
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('offers.store'),
                $data,
                [
                    'Accept' => 'application/json'
                ]
            );

        $response
            ->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'offer'
            ]);
    }

    public function testInvalidData()
    {
        $data = [
            'ride_id' => Ride::inRandomOrder()->take(1)->pluck('id')->first(),
            'driver_id' => null,
            'price' => $this->faker->numberBetween(150, 1000),
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('offers.store'),
                $data
            );

        $response
            ->dump()
            ->assertStatus(422)
            ->assertJsonStructure([
                'message', 'errors'
            ]);


    }

    public function testNoAuth()
    {
        $data = [
            'ride_id' => Ride::inRandomOrder()->take(1)->pluck('id')->first(),
            'driver_id' => null,
            'price' => $this->faker->numberBetween(150, 1000),
        ];

        $response = $this
            ->postJson(
                route('offers.store'),
                $data
            );

        $response
            ->dump()
            ->assertStatus(401)
            ->assertJsonStructure([
                'message'
            ]);
    }
}

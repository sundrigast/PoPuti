<?php

namespace Tests\Feature\Reason;

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
            'by_passenger' => true,
            'text' => $this->faker->words(random_int(2, 6), true)
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('reasons.store'),
                $data,
                [
                    'Accept' => 'application/json'
                ]
            );

        $response
            ->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'reason'
            ]);
    }

    public function testInvalidData()
    {
        $data = [
            'ride_id' => Ride::inRandomOrder()->take(1)->pluck('id')->first(),
            'by_passenger' => 123,
            'reason' => $this->faker->words(random_int(2, 6), true)
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('reasons.store'),
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
            'by_passenger' => true,
            'reason' => $this->faker->words(random_int(2, 6), true)
        ];

        $response = $this
            ->postJson(
                route('reasons.store'),
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

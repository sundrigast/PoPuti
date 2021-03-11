<?php

namespace Tests\Feature\Schedule;

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
            'monday' => $this->faker->boolean(),
            'tuesday' => $this->faker->boolean(),
            'wednesday' => $this->faker->boolean(),
            'thursday' => $this->faker->boolean(),
            'friday' => $this->faker->boolean(),
            'saturday' => $this->faker->boolean(),
            'sunday' => $this->faker->boolean(),
            'time' => $this->faker->time($format = 'H:i'),
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('schedules.store'),
                $data,
                [
                    'Accept' => 'application/json'
                ]
            );

        $response
            ->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'schedule'
            ]);
    }

    public function testInvalidData()
    {
        $data = [
            'monday' => $this->faker->boolean(),
            'tuesday' => $this->faker->boolean(),
            'wednesday' => $this->faker->boolean(),
            'thursday' => $this->faker->boolean(),
            'friday' => $this->faker->boolean(),
            'saturday' => $this->faker->boolean(),
            'sunday' => $this->faker->boolean(),
            'time' => $this->faker->time($format = 'H:i:s'),
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('schedules.store'),
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
            'monday' => $this->faker->boolean(),
            'tuesday' => $this->faker->boolean(),
            'wednesday' => $this->faker->boolean(),
            'thursday' => $this->faker->boolean(),
            'friday' => $this->faker->boolean(),
            'saturday' => $this->faker->boolean(),
            'sunday' => $this->faker->boolean(),
            'time' => $this->faker->time($format = 'H:i'),
        ];

        $response = $this
            ->postJson(
                route('schedules.store'),
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

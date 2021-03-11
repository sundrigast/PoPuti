<?php

namespace Tests\Feature\Message;

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
            'author_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
            'text' => $this->faker->words(random_int(2, 10), true),
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('messages.store'),
                $data,
                [
                    'Accept' => 'application/json'
                ]
            );

        $response
            ->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'chats_message'
            ]);
    }

    public function testInvalidData()
    {
        $data = [
            'ride_id' => 'ride',
            'author_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
            'text' => $this->faker->words(random_int(2, 10), true),
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('messages.store'),
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
            'author_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
            'text' => $this->faker->words(random_int(2, 10), true),
        ];

        $response = $this
            ->postJson(
                route('messages.store'),
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

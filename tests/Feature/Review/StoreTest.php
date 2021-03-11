<?php

namespace Tests\Feature\Review;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    public function testSuccess()
    {
        $data = [
            'from_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
            'to_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
            'rating' => $this->faker->numberBetween(1,5),
            'text' => $this->faker->words(random_int(1,5), true)
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('reviews.store'),
                $data,
                [
                    'Accept' => 'application/json'
                ]
            );

        $response
            ->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'review'
            ]);
    }

    public function testInvalidData()
    {
        $data = [
            'from_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
            'to_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
            'rating' => 'rating',
            'text' => $this->faker->words(random_int(1,5), true)
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('reviews.store'),
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
            'from_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
            'to_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
            'rating' => $this->faker->numberBetween(1,5),
            'text' => $this->faker->words(random_int(1,5), true)
        ];

        $response = $this
            ->postJson(
                route('reviews.store'),
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

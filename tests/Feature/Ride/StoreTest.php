<?php

namespace Tests\Feature\Ride;

use App\Models\Category;
use App\Models\Ride;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreTest extends TestCase
{
    public function testSuccess()
    {
        $data = [
            'position' => $this->faker->address,
            'from_lat' => $this->faker->latitude($min = 59, $max = 61),
            'from_lng' => $this->faker->longitude($min = 30, $max = 31),
            'destination' => $this->faker->address,
            'to_lat' => $this->faker->latitude($min = 59, $max = 61),
            'to_lng' => $this->faker->longitude($min = 30, $max = 31),
            'price' => $this->faker->numberBetween(150, 1000),
            'comment' => $this->faker->words(random_int(2, 10), true),
            'user_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('rides.store'),
                $data
            );

        $response
            ->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'ride'
            ]);
    }

    public function testInvalidData() 
    {    
        $data = [
            'position' => null,
            'from_lat' => null,
            'from_lng' => null,
            'destination' => null,
            'to_lat' => null,
            'to_lng' => null,
            'price' => null,
            'comment' => null,
            'user_id' => null,
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('rides.store'),
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
            'position' => $this->faker->address,
            'from_lat' => $this->faker->latitude($min = 59, $max = 61),
            'from_lng' => $this->faker->longitude($min = 30, $max = 31),
            'destination' => $this->faker->address,
            'to_lat' => $this->faker->latitude($min = 59, $max = 61),
            'to_lng' => $this->faker->longitude($min = 30, $max = 31),
            'price' => $this->faker->numberBetween(150, 1000),
            'comment' => $this->faker->words(random_int(2, 10), true),
            'user_id' => User::inRandomOrder()->take(1)->pluck('id')->first(),
        ];

        $response = $this
            ->postJson(
                route('rides.store'),
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

<?php

namespace Tests\Feature\Ride;

use App\Models\Ride;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->ride = factory(Ride::class)->create();
    }

    public function testSuccess()
    {
        $data = [
            'price' => 123,
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->putJson(
                route('rides.update', $this->ride),
                $data
            );

        $response
            //->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'ride'
            ]);
    }

    public function testInvalidData()
    {
        $data = [
            'status_id' => "OK",
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->putJson(
                route('rides.update', $this->ride),
                $data
            );

        $response
            ->assertStatus(422)
            ->assertJsonStructure([
                'message', 'errors'
            ]);
    }

    public function testNoAuth()
    {
        $data = [
            'comment' => false,
        ];

        $response = $this
            ->putJson(
                route('rides.update', $this->ride),
                $data
            );

        $response
            ->assertStatus(401)
            ->assertJsonStructure([
                'message'
            ]);
    }
}

<?php

namespace Tests\Feature\Driver;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->driver = factory(Driver::class)->create();
    }

    public function testSuccess()
    {
        $data = [
            'latitude' => 53.345
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->putJson(
                route('drivers.update', $this->driver),
                $data
            );

        $response
            //->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'driver'
            ]);
    }

    public function testInvalidData()
    {
        $data = [
            'longitude' => true,
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->putJson(
                route('drivers.update', $this->driver),
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
            'passport' => '5873893498',
        ];

        $response = $this
            ->putJson(
                route('drivers.update', $this->driver),
                $data
            );

        $response
            ->assertStatus(401)
            ->assertJsonStructure([
                'message'
            ]);
    }
}

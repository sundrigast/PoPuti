<?php

namespace Tests\Feature\Schedule;

use App\Models\Ride;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->schedule = factory(Schedule::class)->create();
    }

    public function testSuccess()
    {
        $data = [
            'wednesday' => true,
            'thursday' => true,
            'sunday' => false,
            'time' => '11:20'
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->putJson(
                route('schedules.update', $this->schedule),
                $data
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
            'time' => 1488,
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->putJson(
                route('schedules.update', $this->schedule),
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
            'time' => '11:30',
        ];

        $response = $this
            ->putJson(
                route('schedules.update', $this->schedule),
                $data
            );

        $response
            ->assertStatus(401)
            ->assertJsonStructure([
                'message'
            ]);
    }
}


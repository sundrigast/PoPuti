<?php

namespace Tests\Feature\Message;

use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->message = factory(Message::class)->create();
    }

    public function testSuccess()
    {
        $data = [
            'is_read' => true
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->putJson(
                route('messages.update', $this->message),
                $data
            );

        $response
            //->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'chats_message'
            ]);
    }

    public function testInvalidData()
    {
        $data = [
            'is_read' => 1488,
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->putJson(
                route('messages.update', $this->message),
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
            'is_read' => true,
        ];

        $response = $this
            ->putJson(
                route('messages.update', $this->message),
                $data
            );

        $response
            ->assertStatus(401)
            ->assertJsonStructure([
                'message'
            ]);
    }
}

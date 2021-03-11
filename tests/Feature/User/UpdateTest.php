<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Optix\Media\MediaUploader;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->media = MediaUploader::fromFile(UploadedFile::fake()->create('file-name-1.jpg'))->upload();
    }

    public function testSuccess()
    {
        $data = [
            'verify' => true,
            'photo' => [$this->media->id],
        ];

        $response = $this
            ->actingAs($this->user, 'api')
            ->putJson(
                route('users.update', $this->user),
                $data,
                [
                    'Accept' => 'application/json'
                ]
            );

        $response
            ->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'user'
            ]);
    }

    public function testInvalidData()
    {
        $data = [
            'first_name' => 124,
        ];

        $response = $this
            ->actingAs($this->user, 'api')
            ->putJson(
                route('users.update', $this->user),
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
            'verify' => true,
        ];

        $response = $this
            ->putJson(
                route('users.update', $this->user),
                $data
            );

        $response
            ->assertStatus(401)
            ->assertJsonStructure([
                'message'
            ]);
    }
}

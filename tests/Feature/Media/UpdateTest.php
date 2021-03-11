<?php

namespace Tests\Feature\Media;

use Illuminate\Http\UploadedFile;
use Optix\Media\MediaUploader;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;


class UpdateTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->media = MediaUploader::fromFile(UploadedFile::fake()->create('file-name-1.jpg'))->upload();
    }

    public function testSuccess()
    {
        $data = [
            'verify' => 2,
        ];


        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->put(
                route('files.update', $this->media),
                $data,
                [
                    'Accept' => 'application/json'
                ]
            );

        $response
            ->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'media'
            ]);

    }

    public function testInvalidData()
    {
        $data = [
            'verify' => 'Poputi'
        ];


        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->put(
                route('files.update', $this->media),
                $data,
                [
                    'Accept' => 'application/json'
                ]
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


        $response = $this->put(
                route('files.update', $this->media),
                $data,
                [
                    'Accept' => 'application/json'
                ]
            );

        $response
            ->assertStatus(401)
            ->assertJsonStructure([
                'message'
            ]);
    }
}


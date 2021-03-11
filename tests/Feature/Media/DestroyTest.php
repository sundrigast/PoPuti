<?php

namespace Tests\Feature\Media;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Optix\Media\MediaUploader;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class DestroyTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->media = MediaUploader::fromFile(UploadedFile::fake()->create('file-name-1.jpg'))->upload();
    }

    public function testSuccess()
    {

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->delete(
                route('files.destroy', $this->media),
                [
                    'Accept' => 'application/json'
                ]
            );

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'media'
            ]);

    }

    public function testNoAuth()
    {
        $response = $this->delete(
                route('files.destroy', $this->media), [],
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

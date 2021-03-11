<?php

namespace Tests\Feature\Media;

use Tests\TestCase;
use Optix\Media\MediaUploader;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Models\User;

class StoreTest extends TestCase
{
   
    public function testSuccess()
    {
        $data = [
            'file' => UploadedFile::fake()->create('file-name-1.jpg'),
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post(
                route('files.store'),
                $data,
                [
                    'Accept' => 'application/json'
                ]
                );
            $response
            ->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'media', 'message'
            ]);
    }

    public function testInvalidFile()
    {
        $data = [
            'file' => UploadedFile::fake()->create('script.php')
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post(
                route('files.store'),
                $data,
                [
                    'Accept' => 'applicatoin/json'
                ]
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
            'file' => UploadedFile::fake()->create('file-name-1.jpg')
        ];

        $response = $this
            ->post(
                route('files.store'),
                $data,
                [
                    'Accept' => 'applicatoin/json'
                ]
            );
        
            $response
                ->dump()
                ->assertStatus(401)
                ->assertJsonStructure([
                    'message'
                ]);
    }

    public function testExistence()
    {

        $file = UploadedFile::fake()->create('file-name-1.jpg');

        $media = MediaUploader::fromFile($file)->upload();
        
        $this->assertTrue($media->filesystem()->exists($media->getPath()));

    }
}

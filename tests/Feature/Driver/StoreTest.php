<?php

namespace Tests\Feature\Driver;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Optix\Media\MediaUploader;
use Tests\TestCase;

class StoreTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->media = MediaUploader::fromFile(UploadedFile::fake()->create('file-name-1.jpg'))->upload();
    }

    public function testSuccess()
    {
        $data = [
            'user_id' => 1,
            'latitude' => $this->faker->latitude($min = 59, $max = 61),
            'longitude' => $this->faker->longitude($min = 30, $max = 31),
            'car_brand' => $this->faker->words(random_int(1, 2), true),
            'car_model' => $this->faker->words(random_int(1, 2), true),
            'car_number' => $this->faker->words(random_int(1, 2), true),
            'document' => [$this->media->id],
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('drivers.store'),
                $data,
                [
                    'Accept' => 'application/json'
                ]
            );

        $response
            ->dump()
            ->assertStatus(201)
            ->assertJsonStructure([
                'message', 'driver'
            ]);
    }

    public function testInvalidData()
    {
        $data = [
            'user_id' => 1,
            'car_brand' => 123,
            'car_model' => $this->faker->words(random_int(1, 2), true),
            'car_number' => $this->faker->words(random_int(1, 2), true),
            'registration'=> $this->faker->words(random_int(1, 2), true),
            'document' => 'drivers',
        ];

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->postJson(
                route('drivers.store'),
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
            'user_id' => 1,
            'car_brand' => $this->faker->words(random_int(1, 2), true),
            'car_model' => $this->faker->words(random_int(1, 2), true),
            'car_number' => $this->faker->words(random_int(1, 2), true),
            'registration'=> $this->faker->words(random_int(1, 2), true),
            'document' => [
                'document'[0] => 1,
                'document'[1] => 2
            ],
        ];

        $response = $this
            ->postJson(
                route('drivers.store'),
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

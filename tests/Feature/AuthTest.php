<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\PhoneVerification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase
{
    public function testAuthSuccess()
    {
       // $this->markTestSkipped();
        $data = [
            'phone' => '79028546047'
        ];

        $storeResponse = $this->postJson(
            route('auth.store'),
            $data,
        );

        $storeResponse
            ->assertStatus(201)
            ->assertJson([
                'message' => __('auth.await_confirm')
            ]);

        $user = User::orderBy('id', 'desc')->first();

        $this->assertNotNull(
            $user->verifications
        );
    }

    public function testAuthConfirmAirlockSuccess()
    {
        $user = factory(User::class)->create([
            'phone' => '+79999999999'
        ]);

        $verification = $user->verifications()->save(
            new PhoneVerification([
                'code' => (string)random_int(1000, 9999)
            ])
        );

        $response = $this->postJson(
            route('auth.login'),
            [
                'phone' => $user->phone,
                'code' => $verification->code
            ],
        );

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token'
            ]);

        $this->assertNull(
            $user->verification
        );

        $this->assertNotNull(
            $user->tokens->toArray()
        );
    }

    public function testAuthConfirmAirlockNoCode()
    {
        $user = factory(User::class)->create([
            'phone' => '+79999999999'
        ]);

        $anotherUser = factory(User::class)->create([
            'phone' => '+78888888888'
        ]);

        $verification = $user->verifications()->save(
            new PhoneVerification([
                'code' => (string)random_int(1000, 9999)
            ])
        );

        $this->postJson(
            route('auth.login'),
            [
                'phone' => $anotherUser->phone,
                'code' => $verification->code
            ]
        )
            ->assertStatus(401)
            ->assertJsonStructure([
                'message'
            ]);
    }

    public function testAuthConfirmAirlockWrongCode()
    {
        $user = factory(User::class)->create([
            'phone' => '+79999999999'
        ]);

        $verification = $user->verifications()->save(
            new PhoneVerification([
                'code' => (string)random_int(1000, 9999)
            ])
        );

        $this->postJson(
            route('auth.login'),
            [
                'phone' => $user->phone,
                'code' => '1337'
            ],
        )
            ->assertStatus(422)
            ->assertJsonStructure([
                'message'
            ]);
    }

    public function testAuthCheck()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user, 'api');

        $response = $this->getJson(
            route('auth.check')
        );

        $response
            ->assertStatus(200);
    }

    public function testAuthLogout()
    {
        $user = factory(User::class)->create();

        $token = $user->createToken('PoPuti');

        $response = $this->getJson(
            route('auth.logout'),
            [
                'Authorization' => "Bearer $token->plainTextToken"
            ]
        );

        $response->assertJsonStructure([
            'message'
        ])
            ->assertStatus(200);
    }
}

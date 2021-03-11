<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAdminpanelTest extends TestCase
{
    public function testAdminAuthSuccess()
    {
        $user = factory(User::class)->create([
            'email' => 'example@gmail.com',
            'password' => 'example'
        ]);

        $response = $this->postJson(
            route('admin.login'),
            [
                'email' => $user->email,
                'password' => $user->password
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

    public function testAdminAuthWrongData()
    {
        $user = factory(User::class)->create([
            'email' => 'example@gmail.com',
            'password' => 'example'
        ]);

        $response = $this->postJson(
            route('admin.login'),
            [
                'email' => $user->email,
                'password' => 'wrong password'
            ]);

        $response
            ->assertStatus(401)
            ->assertJsonStructure([
                'message'
            ]);
    }

    public function testAdminAuthUserNotFound()
    {
        $user = factory(User::class)->create([
            'email' => 'example@gmail.com',
            'password' => 'example'
        ]);

        $response = $this->postJson(
            route('admin.login'),
            [
                'email' => 'exampletwst@gmail.com',
                'password' => 'example'
            ]);

        $response
            ->assertStatus(404)
            ->assertJsonStructure([
                'message'
            ]);
    }

    public function testAdminAuthForbidden()
    {
        $user = factory(User::class)->create([
            'email' => 'example@gmail.com',
            'password' => null
        ]);

        $response = $this->postJson(
            route('admin.login'),
            [
                'email' => $user->email,
                'password' => 'root'
            ]);

        $response
            ->assertStatus(403)
            ->assertJsonStructure([
                'message'
            ]);
    }

}



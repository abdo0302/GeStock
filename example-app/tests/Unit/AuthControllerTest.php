<?php

namespace Tests\Unit;

use App\Http\Controllers\AuthController;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\Sanctum;
use Faker\Factory as Faker;
use Mockery;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    public function test_register()
    {
        $faker = Faker::create();
        $email = $faker->unique()->safeEmail;
        $response = $this->post('/api/register', [
            'name' => 'Test User',
            'email' => $email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $response->assertJsonStructure(['user', 'token']);
    }

    public function test_login()
    {
        $response = $this->post('/api/login', [
            'email' => 'tes@example.com',
            'password' => 'password',
        ]);
        $response->assertStatus(200)->assertJsonStructure(['user', 'token']);
    }

    public function test_logout()
    {
        $user = User::factory()->create();

        $token = $user->createToken('auth_token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => "Bearer $token",
        ])->postJson('/api/logout');

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Successfully logged out'
                 ]);
    }
}
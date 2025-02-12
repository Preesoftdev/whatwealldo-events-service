<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthenticationControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_logs_in_a_user_with_valid_credentials()
    {
        $password = 'password';
        $user = User::factory()->create([
            'password' => bcrypt($password),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'user' => [
                    'id', 'email', 'roles'
                ],
                'token'
            ],
            'message'
        ]);

        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_fails_to_log_in_a_user_with_invalid_credentials()
    {
        $user = User::factory()->create([
            'password' => bcrypt('correct_password'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'wrong_password',
        ]);

        $response->assertStatus(400);
        $response->assertJson([
            'error' => 'Credentials does not match'
        ]);

        $this->assertGuest();
    }

    /** @test */
    public function it_logs_out_a_user_successfully()
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $response = $this->postJson('/api/logout');

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'User Log Out Successfully'
        ]);

        $this->assertGuest();
    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterControllerTest extends TestCase
{
    use DatabaseTransactions;
     /** @test */
    public function user_can_register_with_valid_data()
    {
        $email = 'user' . time() . '@system.com';
        $response = $this->post('/api/register', [
            'username' => 'testuser',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => $email,
            'contact' => '1234567890',
            'password' => 'password',
            'password_confirmation' => 'password',
          
        ]);
      
        $response->assertStatus(200); // Check for successful registration

    // Ensure the user is assigned the 'client' role
    $user = User::where('email', $email)->first();
    $user->assignRole('client');

    $this->assertDatabaseHas('users', [
        'email' => $email,
    ]);

    // Assert that the user has the 'client' role
    $this->assertTrue($user->hasRole('client'));
    }
  
}

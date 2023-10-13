<?php

namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticateUserData extends TestCase
{
//  use RefreshDatabase;

    // To reset the database after running tests

    public function test_authData_with_valid_credentials()
    {
// Create a test user in the database
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

// Simulate a request with valid credentials
        $request = Request::create('/user_auth_data', 'POST', [
            'email_address' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response = $this->post('/user_auth_data', $request->all());

// Assert the response content
        $response->assertJson([
            'auth_message' => 'successful',
            'url' => 'dashboard',
        ]);

// Optionally, you can assert that the session has been set correctly
        $this->assertTrue(session('ADMIN_LOGIN'));

// Optionally, you can assert that the response status code is 200 (OK)
        $response->assertStatus(200);
    }

// Add more test methods for other cases (e.g., invalid credentials, email not found)

    public function test_user_can_view_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }








}

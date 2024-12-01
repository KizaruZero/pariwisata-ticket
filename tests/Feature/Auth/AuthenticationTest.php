<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        // Mock Turnstile CAPTCHA response
        Http::fake([
            'https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response(['success' => true], 200),
        ]);

        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
            'token' => 'mock-captcha-token', // Simulate a CAPTCHA token
        ]);

        $this->assertAuthenticated();

        // Assert that the JWT token is included as a cookie
        $response->assertCookie('jwt_token');

        // Assert redirection to the intended route
        $response->assertRedirect(route('home', absolute: false));
    }


    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        // Generate mock token
        $token = JWTAuth::fromUser($user);

        $this
            ->withCookie('jwt_token', $token) // Gunakan token asli
            ->actingAs($user);

        $response = $this->post('/logout');

        $response
            ->assertCookieExpired('jwt_token') // Gunakan assertCookieExpired()
            ->assertRedirect('/');

        $this->assertGuest();
    }

}

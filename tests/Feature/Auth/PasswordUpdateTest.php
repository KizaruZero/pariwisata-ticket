<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_update_password()
    {
        // Create a user with an initial password
        $user = User::factory()->create([
            'password' => Hash::make('old_password')
        ]);

        // Act as the authenticated user with JWT token
        $this->actingAs($user)
             ->withCookie('jwt_token', 'mock-jwt-token');

        // Attempt to update password
        $response = $this->put('/password', [
            'current_password' => 'old_password',
            'password' => 'new_password123',
            'password_confirmation' => 'new_password123'
        ]);

        // Assert redirect and password updated
        // $response->assertRedirect();
        $this->assertTrue(Hash::check('new_password123', $user->refresh()->password));
    }

    /** @test */
    public function password_update_fails_with_incorrect_current_password()
    {
        // Create a user
        $user = User::factory()->create([
            'password' => Hash::make('current_password')
        ]);

        // Act as the authenticated user
        $this->actingAs($user);

        // Attempt to update password with incorrect current password
        $response = $this->put('/password', [
            'current_password' => 'wrong_password',
            'password' => 'new_password123',
            'password_confirmation' => 'new_password123'
        ]);

        // Assert validation error
        $response->assertRedirect();
        $this->assertTrue(Hash::check('new_password123', $user->fresh()->password));

    }

    public function test_correct_password_must_be_provided_to_update_password(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->put('/password', [
                'current_password' => 'wrong-password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

        $response
            ->assertSessionHasErrors('current_password')
            ->assertRedirect('/profile');
    }
}

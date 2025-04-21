<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use DatabaseTruncation;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register_as_student(): void
    {
        // Create the 'student' role if not exists
        $studentRole = Role::firstOrCreate(['name' => 'student']);

        // Register a new user with the 'student' role
        $response = $this->post('/register', [
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Verify user is authenticated and assigned 'student' role
        $this->assertAuthenticated();
        $user = User::where('email', 'student@example.com')->first();
        $this->assertTrue($user->hasRole('student'));

        // Check if the redirection happens correctly
        $response->assertRedirect(route('dashboard', absolute: false));
    }
}

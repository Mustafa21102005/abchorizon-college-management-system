<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use DatabaseTransactions;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        // Create roles for student, teacher, and admin if they don't exist
        $roles = ['student', 'teacher', 'admin'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Create a user and assign the 'student' role
        $student = User::factory()->create(['password' => bcrypt('password')]);
        $student->assignRole('student');

        // Create a user and assign the 'teacher' role
        $teacher = User::factory()->create(['password' => bcrypt('password')]);
        $teacher->assignRole('teacher');

        // Create a user and assign the 'admin' role
        $admin = User::factory()->create(['password' => bcrypt('password')]);
        $admin->assignRole('admin');

        // Authenticate and test redirection for a student
        $response = $this->post('/login', [
            'email' => $student->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticatedAs($student);
        $response->assertRedirect(route('home', absolute: false)); // Student redirects to 'home'

        // Logout before authenticating another user
        $this->post('/logout');

        // Authenticate and test redirection for a teacher
        $response = $this->post('/login', [
            'email' => $teacher->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticatedAs($teacher);
        $response->assertRedirect(route('dashboard', absolute: false)); // Teacher redirects to 'dashboard'

        // Logout before authenticating another user
        $this->post('/logout');

        // Authenticate and test redirection for an admin
        $response = $this->post('/login', [
            'email' => $admin->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticatedAs($admin);
        $response->assertRedirect(route('dashboard', absolute: false)); // Admin redirects to 'dashboard'
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

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/home');
    }
}

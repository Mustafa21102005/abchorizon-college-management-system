<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // In app/Http/Controllers/Auth/AuthenticatedSessionController.php

    public function store(LoginRequest $request)
    {
        // Authenticate the user
        $request->authenticate();

        // Regenerate session for security
        $request->session()->regenerate();

        // Redirect based on the user's role
        $user = Auth::user();

        // Check if the user has a role of 'student'
        if ($user->hasRole('student')) {
            return redirect('/home');  // Redirect to home if student
        }

        // Check if the user has a role of 'admin' or 'teacher'
        if ($user->hasRole('admin') || $user->hasRole('teacher')) {
            return redirect('/dashboard');  // Redirect to dashboard if admin or teacher
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }
}

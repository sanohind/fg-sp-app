<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle login attempt
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // For demo purposes, accept any username/password
        // In production, implement proper authentication
        if ($request->username && $request->password) {
            // Log successful login attempt
            Log::info('User login successful', [
                'username' => $request->username,
                'ip' => $request->ip(),
                'timestamp' => now()
            ]);

            // Redirect to menu page
            return redirect()->route('menu.index');
        }

        // Log failed login attempt
        Log::warning('User login failed', [
            'username' => $request->username,
            'ip' => $request->ip(),
            'timestamp' => now()
        ]);

        return back()->withErrors([
            'username' => 'Invalid credentials.',
        ]);
    }

    /**
     * Handle logout
     */
    public function logout()
    {
        Log::info('User logout', [
            'timestamp' => now()
        ]);

        return redirect()->route('auth.login');
    }
}

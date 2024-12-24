<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required|in:mentor,user',
        ]);

        $credentials = $request->only('email', 'password');
        $role = $request->role;

         // Check for mentor login using a custom guard
    if ($role === 'mentor' && Auth::guard('mentor')->attempt($credentials)) {
        $request->session()->regenerate();
        return response()->json([
            'message' => 'Login successful!',
            'redirect' => '/dashboard-mentor',
        ]);
    }

    // Check for user login using default guard
    if ($role === 'user' && Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return response()->json([
            'message' => 'Login successful!',
            'redirect' => '/dashboard',
        ]);
    }

        return response()->json(['message' => 'Invalid credentials!'], 401);
    }

    public function logout(Request $request)
    {
        $role = $request->role;

        if ($role === 'mentor') {
            Auth::guard('mentor')->logout();
        } else {
            Auth::logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
?>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        try {
            // Find user using the User model
            $user = User::where('email', $credentials['email'])->first();

            if (!$user) {
                return back()->withErrors([
                    'email' => 'No user found with this email address.',
                ])->onlyInput('email');
            }

            if (Hash::check($credentials['password'], $user->password)) {
                // Log the user in using the User model
                Auth::login($user);
                $request->session()->regenerate();

                return redirect()->intended('/admin');
            }

            return back()->withErrors([
                'email' => 'The provided password is incorrect.',
            ])->onlyInput('email');
        } catch (\Exception $e) {
            // Database connection error
            return back()->withErrors([
                'email' => 'Database connection error: ' . $e->getMessage(),
            ])->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}

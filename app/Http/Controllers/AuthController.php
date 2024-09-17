<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(Request $request)
    {

        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:job_seeker,referrer',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Log in the user
        Auth::login($user);

        return redirect()->route('search');
    }
    public function viewLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Set IsActive to true for the authenticated user
            $userId = Auth::id();

            // Find the user in the users table and update the IsActive field
            User::where('id', $userId)->update([
                'IsActive' => 1, // Set to 1 for online
            ]);
        
    
            return redirect()->route('search'); // Redirect after successful login
        }

        return redirect()->back()->withErrors('Invalid credentials');
    }

    public function logout()
    {
        $userId = Auth::id();

        // Find the user in the users table and update the IsActive field
        if ($userId) {
            User::where('id', $userId)->update([
                'IsActive' => 0, // Set to 0 for offline
            ]);
        }
        Auth::logout();

    
        return redirect()->route('login');
    }
    public function showSignUp()
    {
        return view('signup');
    }
}

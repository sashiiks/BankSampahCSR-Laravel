<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // Tampilkan form register
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    // Proses register admin
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Registration successful.');
    }

    // Tampilkan form login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses login admin
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Logout admin
    public function logout()
    {
        Auth::guard('admin')->logout(); // Logout dari guard admin
        return redirect()->route('admin.login')->with('success', 'You have successfully logged out.');
    }
}

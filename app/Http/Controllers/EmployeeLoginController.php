<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeLoginController extends Controller
{
    //

 // Show the employee login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle employee login attempts
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('employee')->attempt($credentials, $request->remember)) {
            // If successful, redirect to the intended location or default route
            return redirect()->intended('/');
        }

        // If unsuccessful, redirect back with an error message
        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    // Log out the employee
    public function logout()
    {
        Auth::guard('employee')->logout();

        return redirect()->route('employee.login');
    }
}



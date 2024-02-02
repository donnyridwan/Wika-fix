<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.index');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            session()->put('name', $user->nama);
            
            
            // Redirect user based on role
            if ($user->role === 'admin') {
                return redirect()->route('pesanan.index');
            } else {
                return redirect()->route('landing.index');
            }
        }

        // Authentication failed
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

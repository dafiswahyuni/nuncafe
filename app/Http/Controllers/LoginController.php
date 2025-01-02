<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Tangani proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke dashboard dengan pesan sukses
            return redirect()->route('dashboard')->with('success', 'Welcome back, ' . Auth::user()->name . '!');
        }

        // Jika gagal login
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
    // Tangani logout
    public function logout()
    {
        // Hapus semua session
        session()->flush();

        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}

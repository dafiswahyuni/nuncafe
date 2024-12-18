<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

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
            'password' => 'required|string|min:6',
        ]);

        // Cari admin berdasarkan email
        $admin = Admin::where('email', $request->email)->first();

        // Verifikasi password
        if ($admin && password_verify($request->password, $admin->password)) {
            // Simpan informasi ke session
            session([
                'admin_id' => $admin->id,
                'admin_name' => $admin->name
            ]);

            return redirect()->route('dashboard')->with('success', 'Welcome back, ' . $admin->name . '!');
        }

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        // Data pengguna statis
        $staticUsers = [
            'Admin' => 'kelompokd',
        ];

        // Memeriksa apakah kredensial yang diberikan sesuai dengan data statis
        if (isset($staticUsers[$credentials['username']]) && $staticUsers[$credentials['username']] === $credentials['password']) {
            // Simulasi autentikasi berhasil
            return redirect()->intended('dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah.');
    }
}
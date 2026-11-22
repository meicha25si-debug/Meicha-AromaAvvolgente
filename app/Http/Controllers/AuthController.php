<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('guest.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('guest.home');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Menampilkan halaman register
    public function showRegister()
    {
        return view('guest.register');
    }

    // Proses register pelanggan
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => 'pelanggan',
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('guest.home')
            ->with('success', 'Registrasi berhasil!');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('guest.home')
            ->with('success', 'Anda berhasil logout.');
    }
}
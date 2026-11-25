<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('profile.index');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ], [
            'login.required' => 'Username atau email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credentials = [
            $loginField => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('profile.index'))
                ->with('success', 'Berhasil login! Selamat datang, ' . Auth::user()->name . '.');
        }

        return back()->withErrors([
            'login' => 'Username/email atau password salah.',
        ])->onlyInput('login', 'remember');
    }

    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'login.required' => 'Masukkan username atau email akun Anda.',
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::where('email', $request->login)
            ->orWhere('name', $request->login)
            ->first();

        if (! $user) {
            return back()->withErrors([
                'login' => 'Akun dengan username atau email tersebut tidak ditemukan.',
            ])->onlyInput('login');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')
            ->with('success', 'Password berhasil diperbarui! Silakan login dengan password baru.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda telah berhasil logout.');
    }
}
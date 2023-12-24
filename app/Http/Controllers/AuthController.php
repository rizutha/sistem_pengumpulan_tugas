<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/beranda');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function handleRoles()
    {
        if (Auth::check()) {
            $roles = Auth::user()->roles;
            if ($roles == 'admin') {
                return redirect('/beranda')->with('success', 'Masuk Sebagai Admin!');
            } elseif ($roles == 'dosen') {
                return redirect('/beranda')->with('success', 'Masuk Sebagai Dosen!');
            } else {
                return redirect('/beranda')->with('success', 'Masuk Sebagai Siswa!');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }
}

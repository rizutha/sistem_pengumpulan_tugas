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
        // dd($request->all());
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
            $roles = auth()->user()->roles;
            if ($roles == 'admin') {
                return redirect('/guru/index')->with('success', 'Masuk Sebagai Admin!');
            } elseif ($roles == 'dosen') {
                return redirect('/guru/index')->with('success', 'Masuk Sebagai guru!');
            } else {
                return redirect('/mahasiswa/index')->with('success', 'Masuk Sebagai Siswa!');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}

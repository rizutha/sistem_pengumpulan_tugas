<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        if (auth()->check()) {
            return redirect()->intended('handleRoles');
        }
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        $field = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL)
            ? 'email'
            : (is_numeric($credentials['login'])
                ? (strlen($credentials['login']) > 10 ? 'NIP' : (strlen($credentials['login']) > 5 ? 'NIS' : 'invalid'))
                : 'email'
            );

        if ($field === 'invalid') {
            return back()
                ->withErrors([
                    'login' => 'Invalid login credentials.',
                ])
                ->onlyInput('login');
        }

        $credentials[$field] = $credentials['login'];
        unset($credentials['login']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('handleRoles');
        }

        return back()
            ->withErrors([
                'login' => 'The provided credentials do not match our records.',
            ])
            ->onlyInput('login');
    }



    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function handleRoles()
    {
        if (Auth::check()) {
            $roles = auth()->user()->roles;
            if ($roles == 1) {
                return redirect('/guru/dashboard')->with('success', 'Masuk Sebagai Admin!');
            } elseif ($roles == 2) {
                return redirect('/guru/dashboard')->with('success', 'Masuk Sebagai Dosen!');
            } else {
                return redirect('/mahasiswa/dashboard')->with('success', 'Masuk Sebagai Mahasiswa!');
            }
        }
    }
}

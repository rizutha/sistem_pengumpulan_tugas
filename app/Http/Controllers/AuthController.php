<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

    public function handleRoles2()
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

    public function index()
    {
        $akun = User::orderBy('id', 'asc')->paginate(5);
        return view('akun.index', ['akun' => $akun]);
    }

    public function create()
    {
        $akun = User::orderBy('id', 'asc')->paginate(5);
        return view('akun.create', ['akun' => $akun]);
    }

    public function detail($id)
    {
        $akun = User::find($id);
        return view('akun.detail', ['akun' => $akun]);
    }
    public function edit($id)
    {
        $akun = User::find($id);
        return view('akun.edit', ['akun' => $akun]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:4', // Sesuaikan aturan validasi password sesuai kebutuhan
            'role' => 'required|in:admin,dosen,mahasiswa',
        ], [
            'name.required' => 'Kolom Nama tidak boleh kosong',
            'email.required' => 'Kolom Email tidak boleh kosong',
            'email.email' => 'Format Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'username.required' => 'Kolom Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Kolom Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
            'role.required' => 'Kolom Role tidak boleh kosong',
            'role.in' => 'Role harus admin, dosen, atau mahasiswa',
        ]);

        // Simpan data ke dalam tabel users
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ]);

        return redirect('akun')->with('Berhasil!', 'User berhasil ditambahkan');
    }

    public function akunUpdate(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'nullable|min:6', // Password bisa kosong jika tidak diubah
            'role' => 'required|in:admin,dosen,mahasiswa',
        ], [
            'name.required' => 'Kolom Nama tidak boleh kosong',
            'email.required' => 'Kolom Email tidak boleh kosong',
            'email.email' => 'Format Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'username.required' => 'Kolom Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
            'password.min' => 'Password minimal 6 karakter',
            'role.required' => 'Kolom Role tidak boleh kosong',
            'role.in' => 'Role harus admin, dosen, atau mahasiswa',
        ]);

        // Update data user menggunakan metode eloquent
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'role' => $request->input('role'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password,
        ]);

        return redirect('akun')->with('success', 'Data Mahasiswa Berhasil diUpdate');
    }

    public function destroy($id)
    {
        // User::find($id)->delete();
        // Mahasiswa::where('users_id', $id)->delete();

        $user = User::findOrFail($id);
        Mahasiswa::where('users_id', $user->id)->delete();
        $user->delete();
        return redirect('akun')->with('success', 'Data Mahasiswa berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Mahasiswa::orderBy('id', 'asc')->paginate(5);
        return view('mahasiswa.index', ['queries' => $query]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nim' => 'required',
                'nama' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'kontak' => 'required',
                'email' => 'required|email',
                'prodi' => 'required',
                'semester' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            ],
            [
                'nim.required' => 'Kolom NIM tidak boleh kosong',
                'nama.required' => 'Kolom Nama tidak boleh kosong',
                'tgl_lahir.required' => 'Kolom Tanggal Lahir tidak boleh kosong',
                'alamat.required' => 'Kolom Alamat tidak boleh kosong',
                'kontak.required' => 'Kolom Kontak tidak boleh kosong',
                'email.required' => 'Kolom Email tidak boleh kosong',
                'email.email' => 'Format Email tidak valid',
                'prodi.required' => 'Kolom Program Studi tidak boleh kosong',
                'semester.required' => 'Kolom Semester tidak boleh kosong',
                'foto.required' => 'Silahkan pilih file foto',
                'foto.mimes' => 'Tipe File harus JPG/JPEG/PNG/GIF/SVG',
                'foto.max' => 'Ukuran file tidak boleh dari 10 MB',
            ]
        );

        Mahasiswa::create($request->all());

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa sudah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate(
            [
                'nim' => 'required',
                'nama' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'kontak' => 'required',
                'email' => 'required|email',
                'prodi' => 'required',
                'semester' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            ],
            [
                'nim.required' => 'Kolom NIM tidak boleh kosong',
                'nama.required' => 'Kolom Nama tidak boleh kosong',
                'tgl_lahir.required' => 'Kolom Tanggal Lahir tidak boleh kosong',
                'alamat.required' => 'Kolom Alamat tidak boleh kosong',
                'kontak.required' => 'Kolom Kontak tidak boleh kosong',
                'email.required' => 'Kolom Email tidak boleh kosong',
                'email.email' => 'Format Email tidak valid',
                'prodi.required' => 'Kolom Program Studi tidak boleh kosong',
                'semester.required' => 'Kolom Semester tidak boleh kosong',
                'foto.required' => 'Silahkan pilih file foto',
                'foto.mimes' => 'Tipe File harus JPG/JPEG/PNG/GIF/SVG',
                'foto.max' => 'Ukuran file tidak boleh dari 10 MB',
            ]
        );

        $mahasiswa->update($request->all());

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa berhasil dihapus');
    }
}

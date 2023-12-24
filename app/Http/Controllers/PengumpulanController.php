<?php

namespace App\Http\Controllers;

use App\Models\Pengumpulan;
use Illuminate\Http\Request;

class PengumpulanController extends Controller
{
    // PengumpulanController.php
    public function index()
    {
        $pengumpulans = Pengumpulan::with(['mahasiswa', 'tugas'])->get();
        
        return view('pengumpulan.index', compact('pengumpulans'));
    }


    public function store(Request $request)
    {
        // Validasi request jika diperlukan
        $request->validate([
            'tugas_id' => 'required|exists:tugass,id',
            'link_tugas' => 'required|url', // Sesuaikan dengan validasi yang dibutuhkan
        ]);

        // Simpan data pengumpulan ke dalam database
        $pengumpulan = new Pengumpulan([
            'id_tugass' => $request->input('tugas_id'),
            'id_mahasiswas' => auth()->user()->mahasiswa->id,
            'link_tugas' => $request->input('link_tugas'),
            'tgl_pengumpulan' => now(),
        ]);

        $pengumpulan->save();

        // Berikan respons redirect ke halaman index pengumpulan
        return redirect()->route('pengumpulan.index')->with('success', 'Tugas berhasil diumpulkan.');
    }


    public function edit($id)
    {
        // Mendapatkan data pengumpulan yang akan diedit
        $pengumpulan = Pengumpulan::findOrFail($id);

        // Validasi atau cek apakah pengguna yang mengakses adalah dosen yang berhak
        // ...

        return view('pengumpulan.edit', compact('pengumpulan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi form edit nilai dan komentar oleh dosen
        $request->validate([
            'nilai' => 'required|numeric',
            'komentar' => 'nullable|string',
        ]);

        // Simpan perubahan nilai dan komentar
        $pengumpulan = Pengumpulan::findOrFail($id);
        $pengumpulan->update([
            'nilai' => $request->input('nilai'),
            'komentar' => $request->input('komentar'),
        ]);

        return redirect()->back()->with('success', 'Nilai dan komentar berhasil diupdate');
    }
}

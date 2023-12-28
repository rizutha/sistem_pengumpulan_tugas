<?php

namespace App\Http\Controllers;

use App\Models\Pengumpulan;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumpulanController extends Controller
{
    // PengumpulanController.php
    public function index()
    {
        $query = Pengumpulan::with('mahasiswa', 'tugas')->get();
        return view('pengumpulan.index', compact('query'));
    }

    public function mhsindex()
    {
        $auth = auth()->user()->id;
        $mahasiswa = Mahasiswa::where('users_id', $auth)->first();
        $query = Pengumpulan::where('id_mahasiswas', $mahasiswa)->get();
        return view('pengumpulan.index', compact('query'));
    }

    public function create(Request $request)
    {
        // Ambil data dari query string
        $tugasId = $request->query('tugas_id');
        $linkTugas = $request->query('link_tugas');

        // Validasi request jika diperlukan
        // ...

        try {
            // Cari data pengumpulan berdasarkan tugas_id dan id_mahasiswas
            $pengumpulan = Pengumpulan::where('id_tugass', $tugasId)
                ->where('id_mahasiswas', auth()->user()->mahasiswa->id)
                ->firstOrFail();

            // Jika data pengumpulan sudah ada, lakukan update
            $pengumpulan->link_tugas = $linkTugas;
            $pengumpulan->tgl_pengumpulan = now();
            $pengumpulan->save();

            // Berikan respons atau arahkan ke halaman yang sesuai
            return redirect()->route('pengumpulan.index')->with('success', 'Link tugas berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            // Jika data pengumpulan belum ada, buat entri baru
            $pengumpulanBaru = new Pengumpulan([
                'id_tugass' => $tugasId,
                'id_mahasiswas' => auth()->user()->mahasiswa->id,

                'link_tugas' => $linkTugas,
                'tgl_pengumpulan' => now(),
            ]);

            $pengumpulanBaru->save();

            // Berikan respons atau arahkan ke halaman yang sesuai
            return redirect()->route('pengumpulan.index')->with('success', 'Tugas berhasil diumpulkan.');
        }
    }

    // PengumpulanController.php
    public function edit($id)
    {
        $pengumpulan = Pengumpulan::find($id);

        return view('tugas.pengumpulanedit', compact('pengumpulan'));
    }

    public function update(Request $request, $id)
    {
        $pengumpulan = Pengumpulan::findOrFail($id);

        $pengumpulan->nilai = $request->input('nilai');
        $pengumpulan->komentar = $request->input('komentar');
        $pengumpulan->save();

        return redirect()->route('tugas.index')->with('success', 'Nilai dan komentar berhasil diperbarui.');
    }

    public function indexDosen()
    {
        $dosenId = Auth::user()->dosen->id;

        // Ambil data pengumpulan berdasarkan id dosen
        $pengumpulans = Pengumpulan::whereHas('tugas', function ($query) use ($dosenId) {
            $query->where('id_dosens', $dosenId);
        })->get();

        return view('tugas.pengumpulans', compact('pengumpulans'));
    }

}

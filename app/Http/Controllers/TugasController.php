<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Tugas;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Tugas::orderBy('id', 'asc')->paginate(5);
        return view('tugas.index', ['queries' => $query]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matkul' => 'required',
            'semester' => 'required',
            'pertemuan' => 'required',
            'tgl_buat' => 'required',
            'tgl_deadline' => 'required',
        ], [
            'matkul.required' => 'Kolom Mata Kuliah tidak boleh kosong',
            'semester.required' => 'Kolom Semester tidak boleh kosong',
            'pertemuan.required' => 'Kolom Pertemuan tidak boleh kosong',
            'tgl_buat.required' => 'Kolom Tanggal Pembuatan tidak boleh kosong',
            'tgl_deadline.required' => 'Kolom Tanggal Deadline tidak boleh kosong',
        ]);

        $users_id = auth()->user()->id;
        $id_dosens = Dosen::where('users_id', $users_id)->first();
        $id = $id_dosens->id;
        Tugas::create([
            'id_dosens' => $id,
            'matkul' => $request->matkul,
            'semester' => $request->semester,
            'pertemuan' => $request->pertemuan,
            'tgl_buat' => $request->tgl_buat,
            'tgl_deadline' => $request->tgl_deadline,
        ]);

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Data Tugas sudah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('tugas.detail', compact('tugas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('tugas.edit', compact('tugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'matkul' => 'required',
            'semester' => 'required',
            'pertemuan' => 'required',
            'tgl_buat' => 'required',
            'tgl_deadline' => 'required',
        ], [
            'matkul.required' => 'Kolom Mata Kuliah tidak boleh kosong',
            'semester.required' => 'Kolom Semester tidak boleh kosong',
            'pertemuan.required' => 'Kolom Pertemuan tidak boleh kosong',
            'tgl_buat.required' => 'Kolom Tanggal Pembuatan tidak boleh kosong',
            'tgl_deadline.required' => 'Kolom Tanggal Deadline tidak boleh kosong',
        ]);

        $idTugas = Tugas::find($id);
        $idTugas->update($request->all());

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Data Tugas Berhasil diUpdate');
    }

    public function updateMhs(Request $request,  $id)
    {
        $request->validate([
            'link_tugas' => 'nullable',
            'tgl_pengumpulan' => 'nullable',
        ]);
        $users_id = auth()->user()->id;
        $id_mhs = Mahasiswa::where('users_id', $users_id)->first();
        $idTugas = Tugas::find($id);
        $idTugas->update([
            'link_tugas' => $request->link_tugas,
            'tgl_pengumpulan' => $request->tgl_pengumpulan,
            'id_mahasiswas' => $id_mhs->id,
        ]);

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Data Tugas Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->delete();

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Data Tugas berhasil dihapus');
    }

    public function pengumpulan(Request $request, $id)
    {
        dd($request->all());
        $tugas = Tugas::where('id', $id)->first();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
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
            'link_tugas' => 'nullable',
            'nilai' => 'nullable',
            'tgl_buat' => 'required',
            'tgl_deadline' => 'required',
            'tgl_pengumpulan' => 'nullable',
        ], [
            'matkul.required' => 'Kolom Mata Kuliah tidak boleh kosong',
            'semester.required' => 'Kolom Semester tidak boleh kosong',
            'pertemuan.required' => 'Kolom Pertemuan tidak boleh kosong',
            'tgl_buat.required' => 'Kolom Tanggal Pembuatan tidak boleh kosong',
            'tgl_deadline.required' => 'Kolom Tanggal Deadline tidak boleh kosong',
        ]);

        Tugas::create($request->all());

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
            'link_tugas' => 'nullable',
            'nilai' => 'nullable',
            'tgl_buat' => 'required',
            'tgl_deadline' => 'required',
            'tgl_pengumpulan' => 'nullable',
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
}
